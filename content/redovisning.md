---
...
Redovisning
=========================



Kmom01
-------------------------

**Hur känns det att hoppa rakt in i objekt och klasser med PHP, gick det bra och kan du relatera till andra objektorienterade språk?**
Det känns bra! Det var en bra guide för sörsta uppgiften och allting kändes logiskt. Är bekant med objektorientering i bla Java sedan tidigare så logiken var inte svår att förstå. Lite ovant att använda $this-> men annars var det inga konstigheter.

**Berätta hur det gick det att utföra uppgiften “Gissa numret” med GET, POST och SESSION?**
Jag tycker att Gissa numret var rätt ktånglig till en början. GET-delen tog ett tag att lösa men när det väl släppte gick det snabbt att göra POST-delen. Hade dock problem med att använda randomfunktionen; jag lyckades inte använda den en gång för att sedan lagra det första genererade numret utan varje gång makeGuess anropades så genererades ett nytt nummer. Valde till slut att lösa det med en startknapp. Om man inte klickar har det hemliga numret värde -1 och ett exception kastas. SESSION-delen tog också ett tag att fixa. Gjorde ett slarvfel som jag satt med rätt länge men utöver det så känns det som att det gick bra.

**Har du några inledande reflektioner kring me-sidan och dess struktur?**
Jag förstår inte hur allt hänger ihop än så länge men det släpper väl snart. Efter att ha tittat på youtube-klippen känns det lite tydligare.

**Vilken är din TIL för detta kmom?**
Mitt TIL för detta kmom är hur sessioner fungerar. Har ju kommit i kontakt med det lite grann tidigare men eftersom att jag fastnade lite på den delen fick jag läsa på en del och nu känns det som att jag förstår mer.


Kmom02
-------------------------

**Hur gick det att överföra spelet “Gissa mitt nummer” in i din me-sida?**
Det gick bra att överföra "Gissa mitt nummer" till me-sidan! Tog mycket hjälp av guiden och kunde därför lösa uppgiften smidigt. 

**Berätta om hur du löste uppgiften med Tärningsspelet 100, hur du tänkte, planerade och utförde uppgiften samt hur du organiserade din kod?**
Den här uppgiften tog lång tid att lösa för mig. Började att skapa klasser och skapa metoder som jag trodde var lämpliga i dessa. Efter ett tag insåg jag att jag inte riktigt hade koll på vad jag gjorde eller hur jag tänkte från början så jag började om. Återanvände då de gamla dice-klasserna och lade till en del i taget ilket gjorde att jag efter hand förstod vilka klasser som behövdes. Jag återanvände Dice, där värde på tärningen sätts och DiceHand används för att hantera tärningsslag. Vidare skapade jag en klass för själva spellogiken, diceGame, en som hanterar varje spelrunda, diceRound, och en som hanterar spelare, dicePlayer. Jag använde mig av *$_GET* för att läsa in antalet tärningar och *$_SESSION* för att komma ihåg varje spelares resultat.   

**Berätta om din syn på modellering likt UML jämfört med verktyg som phpDocumentor. Fördelar, nackdelar, användningsområde? Vad tycker du om konceptet make doc?**
Jag har kommit i kontakt med UML-modellering tidigare och förstår syftet med det. Tog hjälp av videon för att skapa UML-diagrammet och det kändes ganska logiskt. Känns väl som att man får mer nytta av UML när man jobbar i team, eller i mer omfattande projekt. phpDocumentor tycker jag är ett alldeles utmärkt verktyg. Väldigt bra att dokumentationen sker per automatik och man "tvingas" kommentera sin kod på ett annat sätt vilket är bra. 

**Hur känns det att skriva kod utanför och inuti ramverket, ser du fördelar och nackdelar med de olika sätten?**
Jag föredrar att skriva koden utanför ramverket först, för att föra in koden i ramverket när allting fungerar. Eftersom att detta är nytt för mig vill jag veta att allting fungerar som det ska först. Är man lite mer erfaren kan jag tänka mig att det är lättare, eller mindre tidskrävande, att skriva koden direkt i ramverket.

**Vilken är din TIL för detta kmom?**
Namespace i php är väl det som var mest nytt för mig.


Kmom03
-------------------------

Här är redovisningstexten



Kmom04
-------------------------

Här är redovisningstexten



Kmom05
-------------------------

Här är redovisningstexten



Kmom06
-------------------------

Här är redovisningstexten



Kmom07-10
-------------------------

Här är redovisningstexten
