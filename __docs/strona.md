# Rehaborto — specyfikacja strony (plik wsadowy)

Źródło: `opis.txt`. Plik zawiera (A) założenia i wytyczne, (B) strukturę strony, (C) finalną treść sekcja po sekcji, (D) listę brakujących danych.
Etap 1: statyczny HTML (cała treść w plikach), później szablon WordPress.

Konwencje w treści:
- `[w nawiasach kwadratowych]` = placeholder do uzupełnienia (patrz sekcja D)
- `CTA` = przycisk/wezwanie do działania
- `MEDIA` = miejsce na zdjęcie/mapę (nie jest treścią tekstową)
- Podpis autora opisu: Rafał

---

## A. Założenia i wytyczne

### A1. Cel i charakter strony
- Strona **krótka, prosta, bardzo czytelna** (one-page). Bez rozbudowanego serwisu, bez wielu zakładek, bez katalogu zabiegów.
- Prowadzi pacjenta przez naturalne pytania:
  1. Czy możecie mi pomóc?
  2. Jak pracujecie?
  3. Kto będzie się mną zajmował?
  4. Ile to kosztuje?
  5. Jak się umówić?
- Jedna myśl przewodnia: **strona o pacjencie i jego powrocie do sprawności**, a nie o sprzęcie, zabiegach i nas samych.

### A2. Główna idea komunikacyjna
- Oparta na **sprawności**, nie na bólu. Hasła: „Przywracamy sprawność” / „Pomagamy wrócić do sprawności”.
- Ból to tylko jeden z objawów problemu; celem fizjoterapii jest powrót do pracy, codzienności, aktywności lub sportu.

### A3. Zasady szczegółowe
| Sekcja | Zasada |
|---|---|
| Pierwszy ekran | Duże, jasne, naturalne zdjęcie z gabinetu lub pracy fizjoterapeuty z pacjentem; krótki mocny nagłówek; 1–2 zdania wyjaśnienia; bardzo widoczny numer telefonu / przycisk „Umów wizytę” lub „Zadzwoń”. |
| W czym możemy pomóc | Zamiast suchej listy usług — sytuacje, w których pacjent może się odnaleźć: powrót po operacji ortopedycznej, po urazie, zespoły bólowe, sport i aktywność, fizjoterapia stomatologiczna. |
| Sposób pracy / „Droga do sprawności” | Rozmowa i wywiad → dokładne badanie układu ruchu → wyjaśnienie problemu → indywidualny plan → terapia i ćwiczenia → powrót do sprawności. |
| Metody terapii | Pokazane jako **narzędzia**, nie główny produkt: terapia manualna, ćwiczenia terapeutyczne, suche igłowanie, kinesiotaping, fala uderzeniowa, INDIBA itd. — z jasnym komunikatem, że dobierane są tylko gdy mają uzasadnienie w konkretnym przypadku. |
| Zespół | Osobna sekcja z ludźmi. Przy każdym fizjoterapeucie nie długa lista kursów, tylko: kim jest, w czym pomaga, z jakimi pacjentami najczęściej pracuje. |
| Cennik | Podajemy ceny — nie samą liczbę, ale z krótką informacją, co obejmuje wizyta (zmniejsza niepewność przed telefonem). |
| Kontakt | Rejestracja przede wszystkim telefoniczna; na stronie także e-mail, adres, mapa i łatwy dostęp do numeru telefonu. |

### A4. Styl wizualny
- Dużo białej przestrzeni, jasne wnętrza, czyste zdjęcia, naturalni ludzie, nowoczesna i spokojna estetyka.
- Bez przeładowania sprzętem; bez typowej „medycznej” strony pełnej ikon i tekstu.

### A5. Ton
- Profesjonalny, ale normalny i zrozumiały.
- Bez przesadnego marketingu, bez stawiania się w opozycji do innych gabinetów.

### A6. Czego NIE robić
- **Bez** sekcji „dlaczego jesteśmy lepsi od innych” / „czym różnimy się od konkurencji”.
- Jakość pracy ma wynikać z opisu własnych standardów, nie z porównań z innymi.
- Bez wielkiej listy kursów i certyfikatów na stronie głównej.

---

## B. Struktura strony

Układ (jedna strona, kolejność sekcji):

`Pierwszy ekran → W czym możemy pomóc → Jak pracujemy / Droga do sprawności → Metody, których używamy → Zespół → Cennik → Kontakt → Stopka`

| # | Sekcja | Kotwica (id) | Pozycja w menu |
|---|---|---|---|
| 0 | Menu (nagłówek) | — | — |
| 1 | Pierwszy ekran (hero) | `#start` | — |
| 2 | W czym możemy Ci pomóc | `#w-czym-pomagamy` | „W czym pomagamy” |
| 3 | Jak pracujemy + Droga do sprawności | `#jak-pracujemy` | „Jak pracujemy” |
| 4 | Z czego korzystamy (metody) | `#metody` | — (brak w menu) |
| 5 | Zespół | `#zespol` | „Zespół” |
| 6 | Cennik | `#cennik` | „Cennik” |
| 7 | Kontakt | `#kontakt` | „Kontakt” |
| 8 | Stopka | — | — |

### Menu strony
Naprawdę proste menu na górze:

`W czym pomagamy | Jak pracujemy | Zespół | Cennik | Kontakt`

Po prawej wyraźny przycisk **„Zadzwoń / Umów wizytę”** (CTA, link `tel:`).

---

## C. Treść sekcja po sekcji

### 1. Pierwszy ekran (hero) — `#start`

**H1:** Przywracamy sprawność

**Podtytuł:** Pomagamy wrócić do ruchu, pracy, sportu i codziennych aktywności, które są dla Ciebie ważne.

**Tekst:** Naszą pracę opieramy na dokładnym wywiadzie i badaniu układu ruchu. Na tej podstawie wspólnie określamy cel i dobieramy terapię do Twojego problemu, możliwości i potrzeb.

**CTA:** [Zadzwoń i umów wizytę]
**Telefon (bardzo widoczny):** [tel. …………………]

**MEDIA:** duże, jasne, naturalne zdjęcie fizjoterapeuty pracującego z pacjentem albo dobre zdjęcie sali.

---

### 2. W czym możemy Ci pomóc — `#w-czym-pomagamy`

**H2:** W CZYM MOŻEMY CI POMÓC?

**Wstęp:** Nie musisz wiedzieć, jak nazywa się Twój problem ani jakiej terapii potrzebujesz. To naszym zadaniem jest go dokładnie zbadać i zaplanować dalsze postępowanie.

Pięć kafelków/bloków (sytuacje pacjenta):

**2.1 Wracasz do sprawności po operacji?**
Prowadzimy fizjoterapię po operacjach ortopedycznych. Pomagamy stopniowo odzyskać ruch, siłę i funkcję oraz bezpiecznie wrócić do codziennej aktywności, pracy lub sportu.

**2.2 Jesteś po urazie lub kontuzji?**
Pomagamy w powrocie do sprawności po urazach mięśni, ścięgien, więzadeł i stawów. Oceniamy aktualne możliwości i krok po kroku przygotowujemy organizm do ponownego obciążania.

**2.3 Ból ogranicza Twoją aktywność?**
Ból może mieć wiele przyczyn i nie zawsze miejsce, które boli, jest jedynym źródłem problemu. Dlatego zaczynamy od badania i oceny funkcji, a dopiero później planujemy terapię.
Naszym celem nie jest wyłącznie zmniejszenie dolegliwości, ale odzyskanie możliwie pełnej sprawności.

**2.4 Chcesz wrócić do sportu?**
Pracujemy z osobami aktywnymi fizycznie i sportowcami. Pomagamy wrócić do treningu po urazach, poprawić funkcję i siłę oraz przygotować ciało do obciążeń charakterystycznych dla konkretnej dyscypliny.

**2.5 Potrzebujesz fizjoterapii stomatologicznej?**
Pomagamy osobom z dolegliwościami w obrębie stawów skroniowo-żuchwowych i narządu żucia, między innymi przy bólu, nadmiernym napięciu mięśni, ograniczeniu otwierania ust czy dolegliwościach związanych z przeciążeniem tej okolicy.

**Zakończenie sekcji (CTA tekstowe):** Nie wiesz, czy możemy Ci pomóc? Zadzwoń. Porozmawiamy i podpowiemy, od czego najlepiej zacząć.

---

### 3. Jak pracujemy — `#jak-pracujemy`

**H2:** JAK PRACUJEMY?

**Nagłówek wiodący (H3):** Najpierw chcemy zrozumieć problem. Dopiero później wybieramy terapię.

**Akapity:**
1. Każdy pacjent trafia do nas z inną historią, innymi potrzebami i innym celem. Dlatego nie chcemy pracować według jednego schematu.
2. Podstawą naszej pracy jest rozmowa oraz możliwie dokładne badanie układu ruchu. Oceniamy ruch, funkcję, siłę i inne elementy, które mogą mieć znaczenie w danym przypadku.
3. Na tej podstawie określamy problem, ustalamy cel i wspólnie planujemy dalsze postępowanie.
4. Terapia nie jest dla nas zbiorem przypadkowych zabiegów. Każdy jej element powinien mieć swoje uzasadnienie i prowadzić do konkretnego celu.

#### 3a. Twoja droga do sprawności (oś kroków, 5 kroków)

**H3:** TWOJA DROGA DO SPRAWNOŚCI

| Krok | Nazwa | Opis |
|---|---|---|
| 1 | Rozmawiamy. | Poznajemy Twój problem, jego historię, wcześniejsze leczenie, poziom aktywności oraz to, do czego chcesz wrócić. |
| 2 | Badamy. | Oceniamy układ ruchu, funkcję, zakres ruchu, siłę oraz elementy istotne dla Twojego problemu. |
| 3 | Wyjaśniamy. | Omawiamy z Tobą wyniki badania i tłumaczymy, co może być źródłem ograniczeń oraz nad czym warto pracować. |
| 4 | Planujemy i działamy. | Dobieramy terapię oraz ćwiczenia do aktualnych możliwości i regularnie oceniamy postępy. |
| 5 | Wracasz do sprawności. | Stopniowo zwiększamy wymagania tak, aby przygotować Cię do tego, co jest Twoim celem — codzienności, pracy, aktywności fizycznej lub sportu. |

**Podsumowanie (hasło):** Każdy etap terapii ma swój cel.

---

### 4. Z czego korzystamy (metody) — `#metody`

**H2:** Z CZEGO KORZYSTAMY?

**Lead:** Metody i urządzenia traktujemy jako narzędzia. Nie są celem terapii same w sobie.

**Tekst:**
- W zależności od wyniku badania możemy wykorzystywać między innymi terapię manualną, ćwiczenia terapeutyczne i trening siłowy, terapię tkanek miękkich, suche igłowanie, kinesiotaping, falę uderzeniową czy terapię INDIBA.
- Jeżeli jest to potrzebne, wykorzystujemy również obiektywne pomiary siły, które pozwalają oceniać różnice między stronami i monitorować postępy terapii.
- Nie każdy pacjent potrzebuje wszystkich tych metod. Dobieramy je wtedy, kiedy mają uzasadnienie i pomagają osiągnąć ustalony cel.

**Lista metod (do prostego wyświetlenia, bez ikon-ścian i bez opisów zabiegów):**
- terapia manualna
- ćwiczenia terapeutyczne i trening siłowy
- terapia tkanek miękkich
- suche igłowanie
- kinesiotaping
- fala uderzeniowa
- terapia INDIBA
- obiektywne pomiary siły (gdy potrzebne: różnice między stronami, monitorowanie postępów)

---

### 5. Zespół — `#zespol`

**H2:** POZNAJ NASZ ZESPÓŁ

**Lead:** Fizjoterapia to przede wszystkim praca człowieka z człowiekiem.

**Tekst:**
- Łączy nas wspólne podejście do pacjenta: uważna rozmowa, dokładne badanie, świadome planowanie terapii i dążenie do odzyskania możliwie pełnej sprawności.
- Każdy z nas ma również obszary, w których pracuje szczególnie często. Dzięki temu możemy dopasować terapeutę do potrzeb konkretnego pacjenta.

**Karta członka zespołu (szablon powtarzany dla każdej osoby):**
- MEDIA: zdjęcie (naturalne)
- [Imię i nazwisko]
- Fizjoterapeuta
- Najczęściej pracuje z: [np. pacjentami ortopedycznymi, sportowcami, pacjentami pooperacyjnymi].
- W pracy szczególnie interesuje się: [2–3 najważniejsze obszary].
- CTA: [Poznaj terapeutę / Umów wizytę]

**Uwaga:** taki sam krótki profil dla każdego członka zespołu; bez wielkiej listy kursów i certyfikatów na stronie głównej.

---

### 6. Cennik — `#cennik`

**H2:** CENNIK

**Lead:** Wiesz, ile kosztuje wizyta, zanim ją umówisz.

**Pozycje:**

1. **Fizjoterapia — [___ zł]**
   Czas wizyty: około [50–60 minut].
   Wizyta może obejmować wywiad, badanie, omówienie problemu, terapię oraz ćwiczenia — w zależności od tego, czego potrzebujesz na danym etapie.
2. **INDIBA — [___ zł]**
3. **Fala uderzeniowa — [___ zł]**
4. [Pozostałe pozycje cennika.]

**Zakończenie:** Nie wiesz, jaką wizytę wybrać? Zadzwoń. Pomożemy Ci wybrać odpowiednią formę wizyty.

---

### 7. Kontakt — `#kontakt`

**H2:** KONTAKT

**H3:** Chcesz zacząć?

**Tekst:** Rejestracja odbywa się telefonicznie.

- Telefon: [numer telefonu]
- E-mail: [adres e-mail]
- Adres: [adres gabinetu], Skierniewice

**CTA:** [ZADZWOŃ I UMÓW WIZYTĘ]

**MEDIA:** mapa Google oraz ewentualnie zdjęcie wejścia do gabinetu.

---

### 8. Stopka

- [Nazwa gabinetu / logo]
- Fizjoterapia ortopedyczna i sportowa • Fizjoterapia pooperacyjna • Fizjoterapia stomatologiczna
- [telefon] | [e-mail] | [adres]

---

## D. Brakujące dane do uzupełnienia

| Placeholder | Gdzie występuje |
|---|---|
| Numer telefonu | hero, menu (CTA), cennik/kontakt, stopka, linki `tel:` |
| Adres e-mail | kontakt, stopka |
| Adres gabinetu (miasto: Skierniewice) | kontakt, mapa Google, stopka |
| Nazwa gabinetu / logo (robocza nazwa projektu: „rehaborto”) | nagłówek, stopka |
| Zdjęcie hero (fizjoterapeuta z pacjentem lub sala) | hero |
| Dane członków zespołu: imię i nazwisko, zdjęcie, „najczęściej pracuje z”, „szczególnie interesuje się” (2–3 obszary), link do profilu/umówienia | zespół |
| Ceny: Fizjoterapia, INDIBA, Fala uderzeniowa, pozostałe pozycje | cennik |
| Czas wizyty (propozycja 50–60 min) | cennik |
| Mapa Google (embed), ewentualnie zdjęcie wejścia | kontakt |

## E. Uwagi implementacyjne (propozycja, do akceptacji)

- Jedna strona `index.html` z sekcjami i kotwicami z tabeli B; menu sticky z przyciskiem `tel:`.
- Treść w HTML bez zależności od JS; później mapowanie sekcji na części szablonu WP (`front-page.php` + `template-parts/section-*.php`), zespół i cennik jako kandydaci na CPT/ACF.
- Responsywność mobile-first (rejestracja głównie telefoniczna → przycisk „Zadzwoń” zawsze widoczny na mobile).
- Estetyka: dużo białej przestrzeni, jasne zdjęcia, spokojna typografia, minimum ikon.
