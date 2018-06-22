## Toote paigaldamine koosneb peamiselt 3 sammust:

1 - Failide tõstmine veebiserverisse:
- Laadige Github repost projekti failid alla: https://github.com/TaaviMeinberg/suvepraktika .
- Pakkige failid lahti.
- Tõstke projekti kaust enda veebiserveris sobivasse kohta.

**NB: [/php/db/dbConfig.php](/php/db/dbConfig.php) fail on näidis fail ning selles olev sisu on vaja asendada reaalse infoga!**

2 - Andmebaasi loomine:
- Leidke projektis "database" kaustast fail: export.sql .
- Selles failis on phpmyadmin andmebaasi tabelite loomise käsud, nende abil saate luua vajalikud tabelid, kuhu keskkond infot salvestab.

3 - Google login API sidumine google kontoga ning domeeni määramine:
Üldine dokumentatsioon on leitav siin: https://developers.google.com/identity/sign-in/web/sign-in .

- Sellel lehel peate olema Google'i kontoga sisseloginud ning vajutama "Configure a project".
- Selle nupuga looma uue projekti, mis seotakse selle kontoga.
- Selle käigus peaksite "APIs & Services" menüüs "Credentials" vaates looma uue "OAuth client"'i mille "Client ID" lisate index.html'is "content" parameetri väärtuseks.

    Ehk hetkel on selle väärtus:
    ```javascript
    <meta name="google-signin-client_id" content="608677679448-ak55huh9omcppibuhh2t69iectp1r7ok.apps.googleusercontent.com">
    ```
    Ja see peaks olema:
    ```javascript
    <meta name="google-signin-client_id" content="teie-OAuth-clientID">
    ```

- Peate veel selle detail vaates määrama domeeni, kus seda kasutatakse ja kuhu ümbersuunatakse.
    Hetkel on see konfitud nii:
    
    ![Alt text](/doc/img/OAuth.PNG "Optional Title")

    Seal peate "https://greeny.cs.tlu.ee/~meintaav" osa muutma enda domeeni asukohale, kus see project asub.
    
