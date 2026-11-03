# Instrukcja obsługi panelu administracyjnego — strona Rehaborto

Ta instrukcja pokazuje krok po kroku, jak zmieniać treści na stronie: teksty, zdjęcia, cennik, zespół, dane kontaktowe i logo. Nie trzeba umieć programować. Wystarczy przeglądarka.

---

## 1. Jak wejść do panelu

1. Otwórz w przeglądarce adres: **`[adres-strony]/wp-admin`** (np. `https://rehaborto.pl/wp-admin`).
2. Wpisz **login** i **hasło** (wysłałem SMS'em)



3. Po zalogowaniu zobaczysz **Kokpit**. Po lewej stronie jest czarne menu. Z niego korzystasz przez cały czas.

> **Ważne:** na samej stronie (po zalogowaniu) nie ma żadnego paska z przyciskiem „Edytuj”. Wszystko zmieniasz w panelu pod adresem `/wp-admin`, a potem odświeżasz stronę, żeby zobaczyć efekt.

**Jak zmienić hasło:** po prawej u góry kliknij swoje imię → **Edytuj profil** → przewiń do „Zarządzanie kontem” → **Ustaw nowe hasło** → na dole **Aktualizuj profil**.

---

## 2. Jak jest zbudowana strona (najpierw to przeczytaj)

Strona główna to **jedna długa strona z siedmioma częściami** (sekcjami), jedna pod drugą:

| Nr | Część strony | Gdzie ją edytujesz |
|----|--------------|--------------------|
| 1 | Na samej górze: duże zdjęcie z napisem „Przywracamy sprawność” | Rehaborto → **Sekcje strony** |
| 2 | „W czym możemy Ci pomóc?” (rozwijane kafelki) | Sekcje strony + **Powody fizjoterapii** |
| 3 | „Jak pracujemy?” + „Twoja droga do sprawności” | Sekcje strony + **Kroki do sprawności** |
| 4 | „Z czego korzystamy?” (zdjęcie w tle i lista metod) | Sekcje strony |
| 5 | „Poznaj nasz zespół” | Sekcje strony + **Zespół** |
| 6 | „Cennik” | Sekcje strony + **Elementy cennika** |
| 7 | „Kontakt” | Sekcje strony + Dostosuj → Dane kontaktowe |

Wszystkie te rzeczy są w lewym menu pod pozycją **Rehaborto** (ikona teczki). Kliknij ją, a rozwiną się:

- **Sekcje strony**: nagłówki i teksty poszczególnych części strony,
- **Powody fizjoterapii**: kafelki w „W czym możemy Ci pomóc?”,
- **Kroki do sprawności**: ikony i kroki w „Jak pracujemy?”,
- **Elementy cennika**: pozycje cennika,
- **Zespół**: osoby z zespołu (każda ma też własną podstronę).

Poza tym używasz:
- **Wygląd → Dostosuj**: logo, dane kontaktowe, opis strony dla Google,
- **Wygląd → Menu**: menu na górze i w stopce,
- **Media**: wgrane zdjęcia.

### Zasada, którą musisz zapamiętać

> **Nigdy nie usuwaj i nie zmieniaj „adresu” (slug) w Sekcjach strony.**
> Strona znajduje każdą sekcję po jej adresie (np. `cennik`, `kontakt`). Jeśli go zmienisz albo wpis usuniesz, ta część strony **zniknie**.
> Tytuł, tekst i zdjęcia zmieniaj śmiało. Adresu nie ruszaj.

Nie ma potrzeby dodawania nowych Sekcji strony. Jest ich 7 i tyle ma być.

---

## 3. Jak zapisać zmiany

W każdym ekranie edycji po prawej jest niebieski przycisk **Zaktualizuj** (przy nowym wpisie: **Opublikuj**). **Dopóki go nie klikniesz, nic się nie zapisze.** Po kliknięciu odśwież stronę w przeglądarce (klawisz `F5`), żeby zobaczyć zmianę.

Jeśli zmiany nie widać, wciśnij `Ctrl + F5` (odświeżenie z czyszczeniem pamięci przeglądarki).

---

## 4. Edycja Sekcji strony (teksty i zdjęcia)

**Gdzie:** lewe menu → **Rehaborto → Sekcje strony**. Zobaczysz listę siedmiu sekcji. Kliknij tytuł tej, którą chcesz zmienić.

Ekran edycji składa się z:

1. **Tytułu** (u góry): mały nagłówek nad sekcją, np. „Cennik” albo „Jak pracujemy?”.
2. **Dużego pola z treścią** (edytor). Tu piszesz tekst tej sekcji.
   - **Pierwszy nagłówek w treści** (pogrubiony, większy tekst) jest wyświetlany jako **duże zdanie przewodnie** nad resztą. Np. „Najpierw chcemy zrozumieć problem…”. Zostaw go na początku.
   - Reszta (akapity, listy) pojawia się pod nim.
3. **Ramki „Ustawienia sekcji”** niżej, z dodatkowymi polami (opisanymi niżej).

### Jak zmienić tekst
Kliknij w tekst w dużym polu i pisz, tak jak w Wordzie. Nowy akapit: `Enter`. Pogrubienie: zaznacz tekst i kliknij **B**. Lista punktowana: kliknij `+` i wybierz **Lista**.

### Ramka „Ustawienia sekcji”
Pola pojawiają się zależnie od pola **Typ sekcji**. **Nie zmieniaj „Typ sekcji”**, bo część pól zniknie.

| Pole | Co robi | W których sekcjach |
|------|---------|--------------------|
| **Typ sekcji** | Ustawione z góry. Nie zmieniaj. | wszystkie |
| **Obrazek** | Zdjęcie w tle (patrz punkt „Jak zmienić zdjęcie”) | Przywracamy sprawność, Z czego korzystamy, Kontakt |
| **Tytuł listy kroków do sprawności** | Napis nad ikonami kroków („Twoja droga do sprawności”) | Jak pracujemy |
| **Treść sekcji nr 2** | Tekst pod listą elementów (patrz niżej) | patrz niżej |
| **CTA button** | Przycisk pod kafelkami (np. „Umów wizytę”) | W czym możemy Ci pomóc |

**„Treść sekcji nr 2” — gdzie się pokazuje:**
- **W czym możemy Ci pomóc**: tekst obok przycisku pod kafelkami,
- **Jak pracujemy**: zdanie pod ikonami kroków („Każdy etap terapii ma swój cel.”),
- **Cennik**: tekst pod cennikiem („Nie wiesz, jaką wizytę wybrać? Zadzwoń…”),
- **Poznaj nasz zespół** i **Kontakt**: pole się wyświetla w panelu, ale **na stronie nie ma efektu**. Zignoruj je.

Jeśli zostawisz to pole puste, nic się nie wyświetli. To nie błąd.

**Przycisk (CTA button) w sekcji „W czym możemy Ci pomóc”:** kliknij **Wybierz link**, wpisz napis w polu „Tekst linku” i adres w polu u góry. Dla telefonu wpisz `tel:+48515126349` (bez spacji).

### Jak zmienić zdjęcie
1. W polu **Obrazek** kliknij **Usuń** (przy małym zdjęciu).
2. Kliknij **Dodaj obraz**.
3. Wybierz zakładkę **Prześlij pliki** i przeciągnij zdjęcie z komputera (albo wybierz już wgrane z zakładki **Biblioteka mediów**).
4. W prawej kolumnie wypełnij **Tekst alternatywny** (krótki opis, co jest na zdjęciu, np. „Fizjoterapeuta pracujący z pacjentem”). To ważne dla Google i dla osób niewidzących.
5. Kliknij niebieski przycisk **Wybierz**, a potem **Zaktualizuj**.

> **Wskazówka:** najlepiej wgrywać zdjęcia poziome, o szerokości co najmniej 1600 px. Duże pliki (kilka MB) spowalniają stronę. Przed wgraniem możesz je zmniejszyć, np. w programie Paint albo na stronie squoosh.app.

### Sekcja 1 (Przywracamy sprawność): przycisk „Zadzwoń”
Przycisk w tej sekcji jest zwykłym linkiem w tekście. Chcesz zmienić jego napis lub numer? Kliknij w niego w edytorze, następnie w ikonę łańcucha na górze i popraw adres (`tel:+48…`).

---

## 5. „W czym możemy Ci pomóc?”: kafelki (Powody fizjoterapii)

**Gdzie:** **Rehaborto → Powody fizjoterapii**.

Każdy wpis na liście to **jeden kafelek**. Kliknięty kafelek rozwija opis.

- **Tytuł** wpisu → pytanie na kafelku (np. „Jesteś po urazie lub kontuzji?”).
- **Treść** wpisu → opis, który się rozwija.

### Jak dodać nowy kafelek
1. **Rehaborto → Powody fizjoterapii → Dodaj nowy**.
2. Wpisz tytuł i treść.
3. Kliknij **Opublikuj**.

### Jak usunąć kafelek
Na liście najedź na tytuł → **Do kosza**.

### Jak zmienić kolejność kafelków
Zobacz punkt 10 („Kolejność wpisów”).

---

## 6. „Twoja droga do sprawności”: kroki

**Gdzie:** **Rehaborto → Kroki do sprawności**.

Każdy wpis to **jeden krok** (kwadrat z ikoną).

- **Tytuł** → nazwa kroku (np. „Badamy.”),
- **Treść** → krótki opis pod nazwą (**wpisuj sam zwykły tekst**, bez nagłówków i list),
- **Ikona** (ramka „Kroki do sprawności — dodatkowe parametry”) → plik **SVG** (ikona).

### Jak dodać lub zmienić ikonę
Ikona to plik w formacie **SVG** (grafika, która się nie rozmazuje). Strona sama ustawia na niej biały kolor na zielonym tle.

1. W polu **Ikona** kliknij **Dodaj obraz** (albo **Usuń**, a potem **Dodaj obraz**).
2. Wgraj plik `.svg`.
3. Kliknij **Wybierz** i **Zaktualizuj**.

> **Ikona musi być jednokolorowa** (obrys lub wypełnienie ustawione na „currentColor”). Jeśli plik ma na sztywno kolor, np. czarny, ikona pozostanie czarna. Taki plik trzeba poprawić u grafika lub wykonawcy strony.

Dodawanie, usuwanie i kolejność kroków działają tak samo jak w kafelkach.

---

## 7. Cennik

**Gdzie:** **Rehaborto → Elementy cennika**.

Każdy wpis to **jedna pozycja cennika**.

- **Tytuł** → nazwa usługi (np. „Fizjoterapia”),
- **Cena** (ramka „Cennik — parametry”) → wpisz dokładnie tak, jak ma być widoczne, np. `300 zł`,
- **Treść** → opis pod ceną (czas wizyty, co obejmuje). Może zawierać kilka akapitów. Jeśli zostawisz puste, pod ceną nie będzie nic.

Teksty w nawiasach kwadratowych, np. **[50–60 minut]**, to **miejsca do uzupełnienia**. Wpisz tam właściwą wartość i usuń nawiasy.

Dodawanie, usuwanie i kolejność działają tak samo jak w kafelkach.
Tekst **pod całym cennikiem** zmienisz w **Sekcje strony → Cennik → „Treść sekcji nr 2”**.

---

## 8. Zespół

**Gdzie:** **Rehaborto → Zespół**.

Każda osoba ma **własną kartę na stronie głównej** i **własną podstronę** (otwiera się po kliknięciu „Czytaj więcej”).

| Co wpisujesz | Gdzie się wyświetla |
|--------------|---------------------|
| **Tytuł** | imię i nazwisko (karta i podstrona) |
| **Stanowisko** (ramka „Dodatkowe ustawienia zespołu”) | pod imieniem, np. „Fizjoterapeuta” |
| **Krótki opis** (ramka niżej) | krótki tekst na podstronie, po prawej obok zdjęcia, pod stanowiskiem |
| **Treść** (duże pole) | na karcie na stronie głównej (pod stanowiskiem) oraz **pełny opis** na podstronie (pod zdjęciem, na całą szerokość) |
| **Obrazek wyróżniający** | zdjęcie osoby |

### Jak dodać zdjęcie osoby
Zdjęcie dodajesz **w prawej kolumnie**, w ramce **Obrazek wyróżniający** (nie w polu pod tekstem).

1. Kliknij **Ustaw obrazek wyróżniający**.
2. Wgraj lub wybierz zdjęcie → **Ustaw obrazek wyróżniający**.
3. Kliknij **Zaktualizuj**.

Najlepiej, żeby zdjęcie było pionowe (portret).

### Jak dodać nową osobę
**Rehaborto → Zespół → Dodaj nowy** → wpisz imię i nazwisko, stanowisko, treść, ustaw zdjęcie → **Opublikuj**. Karta pojawi się sama.

> Uwaga: na karcie na stronie głównej wyświetla się **całość „Treści”**. Jeśli opis jest bardzo długi, karta będzie wysoka. Na karcie najlepiej zostawić 2–3 krótkie zdania, bo pełny opis i tak widać na podstronie.

---

## 9. Logo, dane kontaktowe i SEO (Wygląd → Dostosuj)

**Gdzie:** lewe menu → **Wygląd → Dostosuj**. Po lewej otworzy się panel ustawień, a po prawej podgląd strony. Zmiany widać na żywo, ale **zapisują się dopiero po kliknięciu niebieskiego przycisku „Opublikuj”** u góry po lewej.

> Na liście znajdziesz też inne pozycje (np. „Dodatkowy CSS”, „Strona startowa”). **Nie ruszaj ich.**

### 9.1. Tożsamość witryny
Kliknij **Tożsamość witryny**:

| Pole | Co robi |
|------|---------|
| **Logo** | Logo w nagłówku i w stopce. Wgraj plik **PNG** z przezroczystym tłem (najlepiej szerokość co najmniej 400 px). |
| **Tytuł witryny** | Nazwa firmy. Wyświetla się w stopce i w karcie przeglądarki, np. „Rehaborto”. |
| **Opis skrótowy** | Krótki dopisek do tytułu w karcie przeglądarki i Google. Nie powtarzaj tu tytułu. Napisz np. „Fizjoterapia Skierniewice”. |
| **Ikona witryny** | Mała ikonka w karcie przeglądarki (kwadrat, min. 512 × 512 px). |

> Logo wgrane w panelu zmienia się w **górnym nagłówku** i w **stopce**. W stopce jest automatycznie wyświetlane **na biało**, więc najlepiej sprawdza się logo jednokolorowe. Małe logo w **przyklejonym pasku menu** (pojawia się po przewinięciu strony) jest stałe i nie zmienia się razem z logo z panelu.

### 9.2. Dane kontaktowe
Kliknij **Dane kontaktowe**. Wpisz:

- **Adres**: pełny, razem z miastem, np. `Aleja Niepodległości 4, 96-100 Skierniewice`,
- **Numer telefonu**: tak, jak ma się wyświetlać, np. `515 126 349`. Strona sama zrobi z niego link do dzwonienia,
- **E-mail**: np. `kontakt@rehaborto.pl`. Jeśli zostawisz puste, linijka z e-mailem się nie wyświetli.

Dane trafiają w **kilka miejsc naraz**: do nagłówka, sekcji Kontakt, stopki i przycisków „Zadzwoń”. Nie musisz zmieniać ich osobno.

### 9.3. SEO i metadane
Kliknij **SEO i metadane**:

- **Opis strony (meta description)**: dwa zdania, które Google pokazuje pod nazwą strony w wynikach wyszukiwania (do 160 znaków). Jeśli zostawisz puste, użyty będzie opis domyślny.
- **Obraz do udostępniania**: zdjęcie, które pokaże się, gdy ktoś wklei link do strony na Facebooku lub w komunikatorze. Najlepiej poziome, 1200 × 630 px.

Pamiętaj o kliknięciu **Opublikuj**.

---

## 10. Kolejność wpisów (kafelki, kroki, cennik, zespół, sekcje)

Wpisy na stronie wyświetlają się w kolejności, którą ustawisz.

1. W lewym menu wejdź w **Rehaborto** i wybierz pozycję **Re-Order** (lub „Sortuj”), jeśli jest na liście.
2. Wybierz rodzaj wpisów (np. Zespół, Elementy cennika).
3. **Przeciągnij** wpisy myszką w odpowiednie miejsce.
4. Kliknij **Update** (lub **Zaktualizuj**).

Można też przeciągać wpisy bezpośrednio na liście (np. **Rehaborto → Elementy cennika**). Gdy najedziesz na wiersz, kursor zmienia się w strzałki.

---

## 11. Menu na górze i w stopce

**Gdzie:** **Wygląd → Menu**.

- Menu na górze nazywa się **Header**.
- W stopce są dwa menu: **Dokumenty** (np. Polityka prywatności) i drugie z linkami do sekcji strony.

### Jak zmienić nazwę pozycji
Kliknij strzałkę przy pozycji → zmień **Etykieta nawigacji** → **Zapisz menu**.

### Jak dodać pozycję prowadzącą do sekcji strony
1. Po lewej rozwiń **Własne odnośniki**.
2. W polu **URL** wpisz: `/#cennik` (znak `/#` i nazwa sekcji).
3. Wpisz tekst, który ma być widoczny, i kliknij **Dodaj do menu**.
4. Kliknij **Zapisz menu**.

Nazwy sekcji (po znaku `#`): `w-czym-pomagamy`, `jak-pracujemy`, `metody`, `zespol`, `cennik`, `kontakt`.

### Jak zmienić kolejność pozycji
Przeciągnij pozycję w górę lub w dół → **Zapisz menu**.

---

## 12. Polityka prywatności i zwykłe strony

**Gdzie:** lewe menu → **Strony**.

- **Polityka prywatności**: zwykła strona z tekstem. Edytuj ją tak jak każdą inną: kliknij tytuł, popraw tekst, **Zaktualizuj**. Strona wyświetla się w stopce i obok komunikatu o cookies.
- **Strona główna**: **nie edytuj**. Jest celowo pusta, bo jej treść składa się z siedmiu sekcji z menu „Rehaborto”.

---

## 13. Zdjęcia i pliki (Media)

**Gdzie:** lewe menu → **Media**.

Tu są wszystkie wgrane zdjęcia. Możesz:
- wgrać nowe: **Dodaj plik multimedialny** → przeciągnij zdjęcie,
- poprawić **Tekst alternatywny** (kliknij zdjęcie → pole po prawej). Opisuje, co jest na zdjęciu.

Dobre zasady:
- zdjęcia poziome mają mieć co najmniej 1600 px szerokości,
- jedno zdjęcie powinno ważyć do 500 KB – 1 MB,
- nazwa pliku bez polskich znaków (np. `gabinet.jpg`).

---

## 14. Czego NIE da się zmienić z panelu

Poniższe elementy są wpisane w kodzie strony. Aby je zmienić, napisz do wykonawcy:

- mały napis nad głównym nagłówkiem na górze strony („Fizjoterapia • Skierniewice”),
- opis pod logo w stopce i tekst „Wszelkie prawa zastrzeżone”,
- napisy na przyciskach: „Zadzwoń i umów wizytę” w sekcji Kontakt, „Czytaj więcej” i „Umów wizytę” na kartach zespołu,
- tekst komunikatu o plikach cookies,
- mapa dojazdu (na razie w jej miejscu jest zdjęcie z pola „Obrazek” w sekcji Kontakt),
- wygląd (kolory, czcionki, układ).

---

## 15. Czego nie robić

- **Nie usuwaj i nie zmieniaj adresu (slug) w Sekcjach strony.**
- **Nie zmieniaj pola „Typ sekcji”.**
- **Nie dezaktywuj i nie usuwaj wtyczek** (Plugins/Wtyczki). Strona potrzebuje ich do działania: Advanced Custom Fields, Custom Post Type UI, Post Types Order, SVG Support.
- **Nie zmieniaj motywu** (Wygląd → Motywy). Aktywny ma być **Rehaborto**.
- **Nie klikaj „Zaktualizuj” przy aktualizacjach WordPressa i wtyczek bez kopii zapasowej.** Zapytaj wykonawcę.
- Po zmianach zawsze kliknij **Zaktualizuj / Opublikuj**.

---

## 16. Szybka ściągawka: „Chcę zmienić…”

| Chcę zmienić… | Idź do… |
|---------------|---------|
| Nagłówek lub tekst sekcji | Rehaborto → Sekcje strony → wybierz sekcję |
| Zdjęcie w tle | Rehaborto → Sekcje strony → sekcja → pole **Obrazek** |
| Pytania w „W czym możemy Ci pomóc?” | Rehaborto → Powody fizjoterapii |
| Kroki i ich ikony | Rehaborto → Kroki do sprawności |
| Ceny | Rehaborto → Elementy cennika → pole **Cena** |
| Zdjęcie i opis fizjoterapeuty | Rehaborto → Zespół → wpis osoby |
| Telefon, adres, e-mail | Wygląd → Dostosuj → **Dane kontaktowe** |
| Logo | Wygląd → Dostosuj → **Tożsamość witryny** |
| Opis strony w Google | Wygląd → Dostosuj → **SEO i metadane** |
| Menu na górze i w stopce | Wygląd → Menu |
| Politykę prywatności | Strony → Polityka prywatności |
| Hasło do panelu | Prawy górny róg → Edytuj profil |

---

## 17. Co zrobić, gdy coś nie działa

| Objaw | Co zrobić |
|-------|-----------|
| Zmiana nie jest widoczna na stronie | Sprawdź, czy kliknąłeś **Zaktualizuj**. Odśwież stronę klawiszami `Ctrl + F5`. |
| Zniknęła cała sekcja ze strony | Wejdź w Rehaborto → Sekcje strony. Czy wpis nie jest w koszu (link „Kosz” nad listą)? Czy nie zmienił się jego adres (slug)? Przywróć z kosza albo napisz do wykonawcy. |
| Ikona kroku jest czarna lub za duża | Plik SVG jest niewłaściwy. Przekaż go wykonawcy. |
| Nie mogę wgrać pliku SVG | Napisz do wykonawcy. Wtyczka „SVG Support” musi być aktywna. |
| Nie pamiętam hasła | Na stronie logowania kliknij „Nie pamiętasz hasła?”. Jeśli e-mail nie dochodzi, napisz do wykonawcy. |

**Kontakt do wykonawcy strony:** [uzupełnij: imię, e-mail, telefon]
