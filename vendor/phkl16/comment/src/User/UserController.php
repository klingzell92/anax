<?php

namespace Anax\User;

use \Anax\Configure\ConfigureInterface;
use \Anax\Configure\ConfigureTrait;
use \Anax\DI\InjectionAwareInterface;
use \Anax\Di\InjectionAwareTrait;
use \Anax\User\HTMLForm\UserLoginForm;
use \Anax\User\HTMLForm\CreateUserForm;
use \Anax\User\User;
use \Anax\User\HTMLForm\UpdateForm;

/**
 * A controller class.
 */
class UserController implements
    ConfigureInterface,
    InjectionAwareInterface
{
    use ConfigureTrait,
        InjectionAwareTrait;



    /**
     * @var $data description
     */
    //private $data;



    /**
     * Description.
     *
     * @param datatype $variable Description
     *
     * @throws Exception
     *
     * @return void
     */
    public function getIndex()
    {
        $session = $this->di->get("session");
        if ($session->has("username")) {
            $user = new User();
            $user->setDb($this->di->get("db"));
            $title      = "Profile";
            $view       = $this->di->get("view");
            $pageRender = $this->di->get("pageRender");

            $data = [
                "content" => $user->getUserData($session->get("username")),
            ];

            $view->add("user/profile", $data);

            $pageRender->renderPage(["title" => $title]);
        } else {
            $this->di->get("response")->redirect("user/login");
        }
    }



    /**
     * Description.
     *
     * @param datatype $variable Description
     *
     * @throws Exception
     *
     * @return void
     */
    public function getPostLogin()
    {
        $title      = "Login";
        $view       = $this->di->get("view");
        $pageRender = $this->di->get("pageRender");
        $form       = new UserLoginForm($this->di);

        $form->check();

        $data = [
            "content" => $form->getHTML(),
        ];

        $view->add("login/login", $data);

        $pageRender->renderPage(["title" => $title]);
    }



    /**
     * Description.
     *
     * @param datatype $variable Description
     *
     * @throws Exception
     *
     * @return void
     */
    public function getPostCreateUser()
    {
        $title      = "A create user page";
        $view       = $this->di->get("view");
        $pageRender = $this->di->get("pageRender");
        $form       = new CreateUserForm($this->di);

        $form->check();

        $data = [
            "content" => $form->getHTML(),
        ];

        $view->add("default2/article", $data);

        $pageRender->renderPage(["title" => $title]);
    }

    /**
     * Handler with form to update an item.
     *
     * @return void
     */
    public function getPostUpdateUser($id)
    {
        $title      = "Updatera användare";
        $view       = $this->di->get("view");
        $pageRender = $this->di->get("pageRender");
        $form       = new UpdateForm($this->di, $id);

        $form->check();

        $data = [
            "form" => $form->getHTML(),
        ];

        $view->add("user/update", $data);

        $pageRender->renderPage(["title" => $title]);
    }

    /**
     * Logout the user
     *
     * @return void
     */
    public function logoutUser()
    {
        $this->di->get("session")->destroy();
        $this->di->get("response")->redirect("user/login");
    }

    /**
     * Render admin page with all users
     *
     * @return void
     */
    public function getAdminIndex()
    {
        if ($this->di->get("session")->has("admin")) {
            $title      = "Admin";
            $user       = new User();
            $user->setDb($this->di->get("db"));
            $view       = $this->di->get("view");
            $pageRender = $this->di->get("pageRender");


            $data = [
                "users" => $user->findAll(),
            ];

            $view->add("user/admin", $data);

            $pageRender->renderPage(["title" => $title]);
        } else {
            $this->di->get("response")->redirect("user/profile");
        }
    }

    /**
     * Delete a user
     *
     *@var integer id of user to delete
     *
     * @return void
     */
    public function adminDeleteUser($id)
    {
        if ($this->di->get("session")->has("admin")) {
            $user       = new User();
            $user->setDb($this->di->get("db"));
            $user->delete($id);
            $this->di->get("response")->redirect("user/admin");
        } else {
            $this->di->get("response")->redirect("user/profile");
        }
    }
}
