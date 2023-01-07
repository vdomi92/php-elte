A beadandóban egy olyan webalkalmazást kell készítenetek, ahol a bejelentkezett felhasználók szavazólapokra (kérdőívekre) tudják leadni a szavazataikat. A szavazólapokat az admin felhasználó tudja létrehozni, amikre a felhasználók egy, vagy több opció leadásával tudnak szavazni. A Főoldalon kilistázódik az összes rendszerben lévő szavazólap, lent azok, amelyeknek a határideje már lejárt, fent pedig a még folyamatban lévő szavazások. Úgy állítottuk nektek össze, hogy a minimálisan teljesítendő feladatok elkészítéséhez ne kelljen munkamenetet és hitelesítést használnotok, így megkönnyítve a ti dolgotokat is ebben a rendhagyó vizsgaidőszakban. Kérdéseiteket tegyétek fel a tárgy Teams csoportjának Általános csatornájában, vagy a Gyakorlatvezetőtöknél!

Feladatok
Előkészületek
Az alkalmazásban szükségünk lesz szavazólapok, felhasználók, és a szavazólapokra a felhasználók által leadott szavazatok tárolására. Lent mutatunk erre egy lehetséges tárolási formátumot, de tetszőleges formátum választható!
A feladat része az is, hogy a beküldött csomagban szerepeljen néhány már felvett szavazólap, amire szavazatot lehet leadni. Minden felhasználó csak egy szavazatot tud leadni az összes szavazólapon, viszont azt a leadási határidőig felülírhatja. Ha az oldalunk nem tartalmaz hitelesítést, akkor egy felhasználó bármennyi szavazatot le tud adni.
A felhasználók közé fel kell venni egy speciális felhasználót, aki admin jogokkal rendelkezik. Neki a belépési adatai rögzítettek, lásd az admin funkciók cím alatt!
Főoldal
A listaoldalon, avagy a főoldalon statikus szöveggel jelenjen meg egy kreatív cím és egy rövid ismertetés az oldalról.
A főoldal elérhető azonosítatlan felhasználók számára is, akik szabadon tudják böngészni az itt megjelenő szavazólapokat.
Az oldalon legfelül mindig a legújabban hozzáadott szavazólap jelenjen meg, alatta pedig a többi szavazólap a hozzáadás dátuma szerint csökkenő sorrendben. Az oldalon két részletben legyenek kilistázva a szavazólapok:
Fent megjelennek azok a szavazólapok, amelyek határideje még nem járt le.
Alatta pedig megjelennek a már lezárt szavazólapok és eredményeik.
Minden szavazólapnál jelenjenek meg a következő elemek:
szavazás sorszáma
a létrehozás ideje
a leadási határideje
szavazógomb
A szavazólapokhoz tartozó gombbal a szavazatunkat tudjuk leadni az aktuális szavazólap szavazóoldalán. Amennyiben az oldalunk tartalmaz munkamenetet és hitelesítést, és az adott felhasználó nincsen bejelentkezve, abban az esetben a felhasználót a bejelentkező oldalra irányítsa át.
Szavazóoldal
A szavazóoldalon jelenjen meg az adott szavazólaphoz tartozó információk:
a szavazás szövegezése
választási lehetőségek
leadás határideje
létrehozás ideje
A szavazóoldalon a szavazási lehetőségek után jelenjen meg a szavazás leadása gomb, melyre kattintva a szavazatunk tartósan eltárolódik. Ellenőrizzük le, hogy a felhasználó kiválasztotta-e valamelyik lehetőséget, ha nem, akkor a leadás után jelezzük neki. Jelezzük azt is, ha sikeres volt a szavazás leadása.
Szavazás létrehozásának oldala
A szavazás létrehozásának oldalán jelenjen meg egy form, ahol a következő adatokat lehet kitölteni, és amiket el fog menteni:
a szavazás szövegezése (text)
választási lehetőségek (textarea, az egyszerűség kedvéért, aminek minden egyes sorában lehet egy szavazási lehetőséget megadni)
lehetséges-e több szavazat leadása (radio)
leadás határideje (date)
létrehozás ideje (date, habár nem kell kitölteni, ezt is el kell menteni)
leadásgomb (submit)
Amennyiben van a megoldásodban hitelesítés és jogosultságkezelés, akkor szavazólapot csak admin tudjon létrehozni! (lásd: admin funkciók)
Hitelesítési oldalak
A főoldalról legyen lehetőség elérni a bejelentkező és regisztrációs oldalt!
Regisztráció során meg kell adni a felhasználónevet, egy email címet és a jelszót kétszer. Mindegyik megadása kötelező, az email címnek email formátumúnak kell lennie, a kétszer beírt jelszóknak pedig egyeznie kell. Regisztrációs hiba esetén jelenjenek meg hibaüzenetek! Az űrlap pedig legyen állapottartó! Sikeres regisztráció után kerüljünk a bejelentkező oldalra, és mentsük el az adatainkat.
A bejelentkezés során a felhasználói névvel és jelszóval tudjuk azonosítani magunkat. A bejelentkezés során előforduló hibákat az űrlap alatt jelezd! Sikeres belépés után kerüljünk a főoldalra!
Admin funkciók
Legyen egy speciális felhasználó, admin néven és admin jelszóval, aki a következő funkciókat éri el:
Hozzá tud adni új szavazólapokat.
Törölni tudja a szavazólapokat.
Szerkeszteni tudja a már felvett szavazólapok adatait. (Plusz feladat)
További elvárások és segítség
Fontos az igényes megjelenés. Ez nem feltétlenül jelenti egy agyon csicsázott oldal elkészítését, de azt igen, hogy 1024x768 felbontásban az oldal jól jelenjen meg. Ehhez lehet minimalista designt is alkalmazni, lehet különböző háttérképekkel és grafikus elemekkel felturbózott saját CSS-t készíteni, de lehet bármilyen CSS keretrendszer segítségét is igénybe venni.

Az űrlapok <form> elemeinek attribútumai közé vegyük fel a novalidate attribútumot is, hogy kikapcsoljuk a böngésző validálását!

```
<form action="" novalidate>
</form>
```

Adatok
A feladatban kétféle adathalmaz van: szavazólapok és felhasználók.
A szavazólapoknál tárolni kell a szavazólap egyedi azonosítóját, a szavazás kérdését, a választási lehetőségeket, azt hogy többféle választ lehet-e jelölni, a szavazás létrehozását és a határidőt. Mentéskor vagy módosításkor ellenőrizni kell, hogy minden mező a feltételeknek megfelelően kitöltésre került-e.
Valahogyan azt is tárolni kell, hogy az adott szavazólaphoz kik adtak le válaszokat, és melyik választási lehetőségre hányan szavaztak. Az anonimitás miatt fontos, hogy ne tároljuk el, hogy melyik szavazatot ki adta le! Ezt megteheted úgy is, hogy a szavazólapok adatszerkezetén belül hozod létre a szavazatokat tartalmazó tömböt; de akár teljesen külön adatfájlban vagy -szerkezetben is dolgozhatsz velük úgy, hogy ott tárolod külön a válaszokat, és azt, hogy kik szavaztak.
A felhasználóknak három kötelező adata van: felhasználónév, email cím, jelszó. Emellett tárolni kell azt, hogy a felhasználó rendelkezik-e admin jogosultságokkal.
A fentiek alapján tehát az alábbi egy lehetséges tárolási mód, de nem kötelező ezt követni:

```
$polls = [
    'poll1' => [
        'id' => 'poll1',
        'question' => 'Szeretnéd-e, hogy legyen INGYEN Pöttyös automata a Lágymányoson?',
        'options' => ['igen', 'nem'],
        'isMultiple' => False,
        'createdAt' => '2022-12-04',
        'deadline' => '2022-12-12',
        'answers' => ['igen' => 2, 'nem' => 0]
        'voted' => ['userid1', 'userid2']
      ],
    'poll2' => [
        'id' => 'poll2',
        'question' => 'Miket tartalmazzon a Pöttyös automata?',
        'options' => ['Klasszikus Túró Rudi', 'Karamellás Guru', 'Tejszelet', 'Fitness Rudi'],
        'isMultiple' => True,
        'createdAt' => '2022-12-05',
        'deadline' => '2024-12-13',
        'answers' => ['Klasszikus Túró Rudi' => 3, 'Karamellás Guru' => 3, 'Tejszelet' => 3, 'Fitness Rudi' => 2]
        'voted' => ['userid1', 'userid2', 'userid3']
        ]
];
$users = [
    'userid1' => [
        'id' => 'userid1',
        'username' => 'admin',
        'email' => 'email1@email.hu',
        'password' => 'admin'
        'isAdmin' => True,
    ],
    'userid2' => [
        'id' => 'userid2',
        'username' => 'user2',
        'email' => 'email2@email.hu',
        'password' => 'user2'
        'isAdmin' => False,
    ],
    'userid1' => [
        'id' => 'userid1',
        'username' => 'user3',
        'email' => 'email3@email.hu',
        'password' => 'user3'
        'isAdmin' => False,
    ],
];
```

A fejlesztés lépésekre bontása
Szeretnénk azoknak is segítséget nyújtani, akiknek nehezebb egy nagyobb feladatot átlátni, megtervezni. Lehet az egész feladatot előre megtervezni, és utána fejleszteni, de az alábbi lépések kisebb részfeladatok megoldásánál is használhatók:

Készítsd el a fejlesztendő alkalmazás statikus HTML prototípusát! Azaz első lépésben csak HTML és CSS segítségével tervezd meg a listaoldalt, a szavazóoldalt, stb. Vannak olyan oldalak, ahol vannak feltételes információk, mint például az, hogy lejárt-e a szavazás, vagy lehet még rá szavazatot leadni. Ezeket is tervezd meg, majd később PHP-val eltünteted. A CSS-t is ki tudod próbálni statikusan, pl. hogy az egyes szavazólapok vagy eredmények hogyan jelenjenek meg, majd később dinamikusan kitöltheted a pontos tulajdonságokat. Az egyes oldalakat linkekkel kötheted össze.
Gondold át, hogy milyen adatokra lesz szükséged. Mit kell tárolni, azokban milyen mezőket?
Hol tárolod a felhasználókat?
Hol tárolod a szavazólapokat?
Hol tárolod az egyes szavazólapokhoz tartozó szavazatokat?
Hogyan tárolod azt, ha a felhasználó lead egy szavazatot?
A szavazás létrehozásánál hogyan lehet több szavazatot leadni majd, a több szavazatot felhasználónként hogyan tárolom?
Gondold át, hogy az előbb átgondolt adatszerkezetekből hogyan tudod az oldalaid számára a megfelelő adatokat kinyerni? Készíts ezekhez egy-egy függvényt, de sokkal jobb, ha ezeket az adott Storage osztály metódusaiként implementálod.
Hogyan kapod vissza az egy szavazólaphoz tartozó adatokat?
Hogyan kapom vissza a legutoljára hozzáadott szavazólapokat?
Hogyan ellenőrzöm, hogy egy szavazólapon szavaztott-e már a felhasználó?
Űrlapoknál két utat kell bejárni:
siker esetén mi történjen?
hibát hogyan érzékelem, hogyan jelenítem meg, hogyan lesz űrlap állapottartó?
Plusz feladatok
Csoportok létrehozása: Ehhez készíts el egy plusz oldalt, amit csak az admin felhasználó tud elérni. Ennek az oldalnak a lényege az lesz, hogy a felhasználók közül csoportokat tud létrehozni az admin, és olyankor csak az adott felhasználókhoz van hozzárendelve az adott kérdőív. Az oldalon jelenjen meg egy form, ahol meg lehet adni a csoportnak a nevét, illetve például <select name='' multiple> típusú űrlapelem, ami kilistázza az összes felhasználót, és ezek közül lehet kiválasztani azokat, hogy kiket szeretnénk belerakni a csoportba. A csoportokat egy új adathalmazban érdemes tárolni, viszont a szavazólapokat tartalmazó adatoknál fel kell venni egy új adattagot, ami azt a csoportot fogja tárolni, amelyikhez a kérdőív hozzá lett rendelve. Kérdőívet lehessen minden felhasználóhoz hozzárendelni. A csoportokhoz rendelt kérdőívek csak a csoport tagjainál jelenlenek meg.
Szavazólapok módosítása: Az admin felhasználó tudja módosítani a szavazólapok tulajdonságait. Itt gondold végig azt, hogyha változtatod például a szavazási opciókat, akkor az a már leadott szavazatokat hogyan fogja befolyásolni. Megcsinálhatod azt, hogyha változtatsz a szavazási opciókon, akkor törölje ki az eddig leadott szavazatokat, viszont például, ha csak a szövegbe, vagy a leadási határidőbe nyúlsz bele, ne törölje ki az eddig leadott szavazatokat!
Pontozás
A feladat megoldásával 20 pont szerezhető. Vannak minimum elvárások, melyek teljesítése nélkül a beadandó nem elfogadható. A plusz feladatokért további 5 pont szerezhető a maximális 20 pont felett, azaz ha valaki mindent megcsinál, a beadandóra akár 25 pontot kaphat.

A gyakorlati jegyszerzés PHP beadandóhoz kapcsolódó feltételei: minden minimumkövetelmény teljesítése ÉS a késésre járó pontlevonás után is legalább 8 pont (40%) elérése. (Halogatás előtt tehát érdemes lehet megfontolni, hogy mi az egyszerűbb: határidőre elkészíteni a minimális követelményeknek megfelelő verziót; vagy két héttel később közel tökéletes verzióra a minimálisnál alig több pontot kapni.)

Minimálisan teljesítendő (enélkül nem fogadjuk el, 8 pont)
Főoldal: megjelenik (0 pont)
Főoldal: az összes létrehozott szavazólap megjelenik (1 pont)
Főoldal: a szavazólapokon látszanak a szavazólapokhoz tartozó adatok: a szavazás sorszáma, a létrehozás ideje, a leadási határideje (1 pont)
Főoldal: az oldalon külön látszódnak azok a szavazólapok, melyeknek a határideje már lejárt, és mindkét csoportot a létrehozási dátumuk szerint csökkenő sorrendben látjuk (tehát a legfrissebb van legfelül) (1 pont)
Főoldal: egy szavazólapra rákattintva a szavazóoldalra jutunk (1 pont)
Szavazóoldal: megjelennek a szavazólapokozhoz tartozó adatok, a szövegezése, és a választási lehetőségek, illetve a szavazás leadása gombbal le tudjuk adni a szavazatunkat (2 pont)
Szavazóoldal: ha jól adtuk meg a szavazóoldalon lévő űrlapon az adatokat (tehát adtunk le szavazatot), akkor az oldal értesít minket a szavazás sikerességéről. Ha szavazat megjelölése nélkül próbáljuk meg elküldeni a szavazatunkat, jelzi a hibát. (0,5 pont)
Szavazólap létrehozása: a szavazás létrehozó oldalnál meg lehet adni a szavazáshoz tartozó kérdést, választási lehetőségeket (kettőt, vagy többet), hogy mi legyen a szavazási leadási határideje, és elmenti azt is, hogy mikor lett létrehozva (1,5 pont)
Az alap feladatok (12 pont)
Bejelentkezés: hibás esetek kezelése (1 pont)
Bejelentkezés: sikeres bejelentkezés (1 pont)
Regisztrációs űrlap: megfelelő elemeket tartalmazza (név, e-mail, jelszó, jelszó mégegyszer) (0,5 pont)
Regisztrációs űrlap: hibás esetek kezelése, hibaüzenet, állapottartás (1,5 pont)
Regisztrációs űrlap: sikeres regisztráció (0,5 pont)
Főoldal: bejelentkezés nélkül a szavazólapok mellett lévő gomb a bejelentkező oldalra visz. Ha be vagyunk jelentkezve a gomb a szavazóoldalra visz. (1 pont)
Főoldal: a gomb szövegén látszik, hogy szavaztunk-e már az adott szavazólapon (Ha szavaztunk már, akkor például a Szavazat frissítése jelenjen meg rajta) (0,5 pont)
Főoldal: a szavazólapon a leadási határidő után nem tudjuk módosítani a szavazatunkat, és a határidő után látszik csak a szavazás eredménye (1 pont)
Admin funkció: be lehet jelentkezni az admin felhasználó adataival (0,5 pont)
Admin funkció: új szavazólap létrehozása CSAK az admin felhasználóval lehetséges (0,5 pont)
Admin funkció: a szavazólap létrehozásánál be lehet állítani, hogy az opciókból egyet vagy többet tudjon a kitöltő kiválasztani (radio vagy checkbox) (1 pont)
Admin funkció: meglévő szavazólap törlése admin felhasználóval (1 pont)
Szavazóoldal: a szavazóoldalon látszik, hogy egy szavazólapon egy vagy több dologra tudunk szavazni; és ha lehet többre, több dologra is le tudjuk adni a szavazatunkat, amely helyesen el is tárolódik (2 pont)
Késés: -0,5 pont / megkezdett nap!
Plusz feladatok (plusz 5 pont)
Admin funkció: a létező felhasználók között az admin csoportokat tud létrehozni, a szavazólap létrehozásánál ezekhez a csoportokhoz egy kattintással hozzá tudja rendelni (3 pont)
Admin funkció: Az admin bejelentkezése esetén megjelenik egy plusz gomb a Főoldalon a szavazólapoknál, amiknek a segítségével módosítani tudja a feladatlapokhoz tartozó adatokat, és ezek frissülnek a tárolt adataink között. (2 pont)
További elvárások
Az elkészült feladatot tömörítve, az összes szükséges állománnyal, illetve a program gyökérmappájában elhelyezett README.md fájllal együtt legkésőbb a határidőig (plusz 2 hét késés pontlevonással) kell feltölteni a Canvas rendszerbe.

A megvalósításához NEM használható semmilyen PHP keretrendszer vagy külső PHP függvénykönyvtár. Csak CSS keretrendszerek használhatók.
