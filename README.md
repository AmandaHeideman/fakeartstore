# fakeartstore

## WEBB20 – Backend 2 PHP – Inlämningsuppgift 2 (G-VG)

## Kravspecifikation

### Del 1 (G-nivå)

 - Skapa ett eget RESTful API som genererar 20 olika produkter,
som påminner om FakeStoreAPI
 - Live demo finns här:
https://webacademy.se/fakestore
Du ska alltså skapa en kopia av FakeStoreAPI men ändra gärna till egna produkter!
 - Publicera ditt API via Heroku.

### Del 2 (VG-Nivå)

För att få VG måste du dessutom arbeta med följande
 - Man ska kunna ange antal produkter via en GET-Request t.ex.
https://webacademy.se/fakestore/v2/?show=5
Då slumpgenereras 5 produkter via API:et.
 - Man ska kunna ange kategori t.ex.
https://webacademy.se/fakestore/v2/?category=jewelery
 - Säkerhetsoptimera API:et genom att validera data som skickas till serven!
Visa lämpliga meddelande i JSON-format vid fel t.ex.
https://webacademy.se/fakestore/v2/?show=100
https://webacademy.se/fakestore/v2/?category=jew
https://webacademy.se/fakestore/v2/?category=jew&show=100
 - Publicera ditt API via Heroku (samma repo)
