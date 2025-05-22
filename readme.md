dbdiagram: [LINK](https://dbdiagram.io/d/Detective_subject_assignment-68219c375b2fc4582f29c269)

Használat:
- backend server elindításához szükséges a composer és egy alap codeigniter4 project, amibe pullolni kell a repot
    - `composer create-project codeigniter4/appstarter .`
    - szükséges a .env fájlban a db elérésének beállítása, valamint fontos beállítani a base_url-t http://localhost:8080-ra!
    - majd terminálban `php spark migrate`, hogy lefussanak a migrációk
    - majd terminálban `php spark db:seed DatabaseSeeder` hogy bekerüljenek az adatok
    - majd terminálban a `php spark serve` paranccsal lehet elindítani
- frontend server elindításához a frontend mappában futtassa le az `npm i` parancsot
    - majd npm run dev, és a böngészőben el is éri.