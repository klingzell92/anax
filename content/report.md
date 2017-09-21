---
title: "Report "
...
Kmom01
=========================

##Gör din egen kunskapsinventering baserat på PHP The Right Way, berätta om dina styrkor och svagheter som du vill förstärka under det kommande året.
Det jag känner att jag har koll på är att skriva kod som håller en bra standard även om det kan bli vissa fel ibland. Jag skulle också säga att jag har ganska bra koll på Objekorienterad programmering då vi gick igenom detta i oophp kursen.
Grunderna vad gäller kodningen känner jag att jag kan bra. Hur man jobbar mot databaser i php tycker jag också att jag har koll på.

Det jag känner att jag skulle behöva lära mig mer om är säkerhet och testing även fast vi jobbade en del med detta förra terminen. Dependency Injection var något nytt för mig som jag vet att vi ska lära oss om i denna kursen så det ser jag fram emot.
Funktionel Programmering var något vi läste lite om förra året men jag känner att jag skulle behöva lära mig mer om det. Överlag finns det nog väldigt mycket jag kan bli bättre på men efter förra året känner jag i alla fall att jag har bra koll på grunderna i PHP.

##Vilket blev resultatet från din mini-undersökning om vilka ramverk som för närvarande är mest populära inom PHP (ange källa var du fann informationen)?
Utav vad jag kunde hitta så var det mest använda ramverket inom PHP för närvarande Laravel. Enligt en undersökning som Coders Eye gjorde så användes Laravel ut av 40% av deras följare och tvåan användes utav 15%. Andra populära ramverk som fanns med på de sidorna där jag hittade informationen var Code Igniter, Symfony och Yii.
Källor:
[Coders Eye](https://coderseye.com/best-php-frameworks-for-web-developers/)
[Medium](https://medium.com/@elitechsystems/the-most-popular-php-frameworks-in-2017-a90a1189405e)


##Berätta om din syn/erfarenhet generellt kring communities och specifikt communities inom opensource och programmeringsdomänen.
Den erfarenheten som jag har utav communities är just inom programmeringsvärlden. Och jag tycker att det är bra, själv använder jag väldigt ofta stackoverflow för att leta efter information om liknande problem som jag har och de flesta av gångerna så hittar man något användbart.
Det finns säkert de som använder det till att diskutera olika ämnen inom programmering vilket också är bra. Jag själv är inte delaktig utan använder det mest som ett verktyg för att leta efter information.

##Vad tror du om begreppet “en ramverkslös värld” som framfördes i videon?
Det låter bra tycker jag, att kunna välja enbart de modulerna som man tycker är nödvändiga för ett visst projekt. Men just att kunna välja vilka moduler som passar kräver nog en del erfarenhet.
Så för mer oerfarna programmerare är det kanske lättare och smidigare att använda ett ramverk.

##Hur gick dina förberedelser inför kommentarssystemet?
Jag har inte lagt överdrivet mycket med tid på att förbereda mig för att göra ett kommentarsystem. Men jag har kollat runt lite på t.ex. stackovweflow och twitter för att se vilka delar som behövs.
Så jag har inte börjat med att koda ihop någonting än, utan jag väntar tills kommande kursmoment för det.

Kmom02
=========================

##Vilka tidigare erfarenheter har du av MVC? Använde du någon speciell källa för att läsa på om MVC? Kan du med egna ord förklara någon fördel med kontroller/modell-begreppet, så som du ser på det?
Jag har hört talas om det tidigare och har läst en del om det men har aldrig använt det i praktiken. Jag använde wikipedia länkarna som fanns bland läsanvisningarna samt att jag kolla på några YouTube klipp om det.Fördelen med MVC är väl att man får en mer strukturerad kod ner man delar upp sina klasser i kontroller och model.
Då blir nog också koden mer läsbar och lättare att ändra i. Även om jag personligen har lite problem med att veta exakt vad man skall lägga var. Men det är nog nyttigt för mig att lära mig om designmösnter såsom MVC då min kod brukar tendera att bli rörig.

##Kom du fram till vad begreppet SOLID innebar och vilka källor använde du? Kan du förklara SOLID på ett par rader med dina egna ord?
Jag har inte riktigt förstått begreppet SOLID några utav principerna förstår jag men inte alla.

S. Innebär att en klass enbart skall utföra ett jobb.
O. En klass skall lätt kunna utökas utan att ändra i klassen.
L. Alla klasser skall kunna ersättas utav sina subklasser.
I. Klasser skall inte behöva implementera gränssnitt som de inte använder eller implementera metoder de inte använder.
D. Klasser skall inte vara beroende utav varandra utan de ska kopplas samman med gränssnitt.

Källor som jag använde mig utav var olika videos på YouTube samt:
[scotch](https://scotch.io/bar-talk/s-o-l-i-d-the-first-five-principles-of-object-oriented-design)


##Gick arbetet med REM servern bra och du lyckades integrera den i din me-sida?
Ja det gick bra då det bara var att följa övningen. Jag hade ett litet problem som var att jag först inte kunde se htdocs mappen men det var bara att ändra i .htaccess så fungerade det.
Det var intressant att se hur koden ändrades under övningen och hur den blev mer strukturerad med mindre kod i routerna.

##Berätta om arbetet med din kommentarsmodul, hur långt har du kommit och hur tänker du?
Det har gått ganska bra skulle jag säga. Så som den är nu så kan man lägga till en kommentar genom att skriva sin mail och sedan när den visas upp så syns en gravatar baserad på mailadressen.
Jag använde remservern som utgångspunkt för hur jag skulle skriva min kod vilket underlättade. Så jag har alltså en comment klass som är min model. Samt en CommentController klass som använder sig utav commentklassen, jag vet inte om all kod ligger på rätt ställe men jag får ändra på det senare.
Jag väntade med att använda en databas till kommande kursmoment utan använde sessionen istället.
Som det är nu så min kommentarmodul en egen vy och jag har inte riktigt förstått hur jag skall kunna implementera den i andra sidor som ett kommentarsfält.

Kmom03
=========================

##Hur känns det att jobba med begreppen kring dependency injection, service locator och lazy loading?
Med hjälp av artiklarna så var det inga problem med att implementera de här begreppen i min kod. Men jag är inte helt säker på att jag förstår alla begreppen fullt ut och varför man skall skriva sin kod på det sättet.
Men jag kanske får en bättre förståelse för det ju mer vi använder det.


##Hur känns det att göra dig av med beroendet till $app, blir $di bättre?
Jag har svårt att avgöra om det blir bättre med $di. För mig känns det som att det inte har blivit någon större skillnad utan att vi har flyttat beroendet ifrån $app till $di.
Men jag har ändrat så att jag mig veteligen inte använder mig utav $app någonstans i koden.


##Hur känns det att återigen göra refaktoring på din me-sida, blir det förbättringar på kodstrukturen, eller bara annorlunda?
Det kändes bra, koden blir lite bättre och mer strukturerad för varje gång tycker jag. Särskilt routsen har blivit bättre strukturerade jämfört med hur jag använde dem förut då jag hade den mesta av min kod där.

##Lyckades du införa begreppen kring DI när du vidareutvecklade ditt kommentarssystem?
Jag gjorde på samma sätt som vi gjorde med remservern i artiklarna så jag antar det. Jag kanske hade lite småproblem men för det mesta var det bara att ersätta $app med $di.
Jag lade till bl.a. så att man kan ta bort kommentarer samt redigera dem som jag inte hann med förra gången.

##Påbörjade du arbetet (hur gick det) med databasmodellen eller avvaktar du till kommande kmom?
Jag avaktar med databasmodellen till nästa kursmoment då jag redan är sen med detta kursmoment. Men jag har tänkt en del på hur jag ska lösa det och har nog det mesta klart för mig hur jag ska göra.
Fast jag väntar till nästa kmom med att implementera det.

##Allmänna kommentarer kring din me-sida och dess kodstruktur?
Om man jämför med hur koden var ifrån början och hur min kod har vart tidigare så har det defenetivt blivit bättre.
Det blev mycket bättre struktur på koden när jag refaktorerade om koden till att följa MVC i förra kursmomentet. Jag kanske har kod som skulle behöva struktureras om men det får duga som det är just nu.
