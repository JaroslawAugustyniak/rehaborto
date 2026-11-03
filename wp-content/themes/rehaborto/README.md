# Rehaborto — motyw WordPress

Motyw klasyczny (PHP) z zasobami budowanymi w Vite.

## Praca

```bash
npm install       # jednorazowo
npm run dev       # serwer Vite (HMR); motyw sam wykrywa plik `hot` i ładuje assety z localhost:5173
npm run build     # produkcja: wynik w dist/ (motyw czyta dist/.vite/manifest.json)
```

Bez uruchomionego `npm run dev` motyw ładuje pliki z `dist/`, więc po zmianach w `src/` trzeba zrobić `npm run build`.
Tryb dev działa tylko przy `WP_ENVIRONMENT_TYPE = local`.

## Struktura

- `front-page.php` — strona główna złożona z `template-parts/section-*.php`
- `header.php`, `footer.php`, `index.php` — szkielet i szablon domyślny
- `inc/site.json` — treść i dane kontaktowe (telefon, e-mail, adres, ceny, zespół…); czytane przez `rehaborto_data()`
- `inc/assets.php` — ładowanie CSS/JS z Vite (dev/produkcja)
- `src/` — style (`src/styles`) i skrypty (`src/js`)
- `assets/images/` — obrazy
- `__docs/` — archiwum: statyczny prototyp (Handlebars) z pierwszego etapu
