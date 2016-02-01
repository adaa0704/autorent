Aplikacja wykorzystuje dwa g³ówne Bundle  – u¿ytkownika (UserBundle) i wypo¿yczenia (RestAndDriveBundle). 
UserBundle
Kontrolery:
•	UserController – odpowiedzialny za wszystkie akcje zwi¹zane z u¿ytkownikiem
Typy:
•	User – definiuj¹cy usera, zawiera pola takie jak:
o	Id
o	Samochód
o	Wypo¿yczenia
o	IDsamochodu
Widoki:
•	Rejestracji
•	Logowania
•	Podgl¹du u¿ytkownika
RestAndDriveBundle:
Kontrolery:
•	CarController – odpowiedzialny za wszystkie akcje zwi¹zane z samochodem
•	CarImageController – odpowiedzialny za wszystkie akcje zwi¹zane ze zdjêciami samochodu
•	RentController – odpowiedzialny za wszystkie akcje zwi¹zane z wynajmem samochodu
•	DefaultController – odpowiedzialny za stronê g³ówn¹, kontakt, listê samochodów i dawne transakcje wynajmu
Typy:
•	Car – definiuj¹cy samochód, zawiera pola takie jak:
o	Wypo¿yczenia
o	Zdjêcia
o	U¿ytkownik
o	ID
o	Nazwa
o	Iloœæ miejsc
o	Cena
o	Dostêpnoœæ
•	CarImage – definiuj¹cy zdjêcia samochodu, zawiera pola takie jak:
o	Auto
o	ID
o	Zdjêcie
•	Kontakt – definiuj¹cy wiadomoœæ kontaktow¹, zawiera pola takie jak:
o	Id
o	Nazwa (imiê)
o	Email
o	Wiadomoœæ
•	Rent – definiuj¹cy wynajem, zawiera pola takie jak:
o	Auto
o	U¿ytkownik
o	ID
o	Od
o	Do
o	Data zg³oszenia wynajmu
o	Cena wynajmu
o	Aktywny
Formularze:
•	CarImageType – do uploadu zdjêæ samochodu
•	CarType – do definiowania samochodów
•	ContactType – do definiowania wysy³ki wiadomoœci kontaktowych
•	RentType – do definiowania wynajmu
•	SearchType – do definiowania wyszukiwania (filtrowania) samochodu
Widoki:
•	Car, w tym:
o	Pojedynczego samochodu
o	Edycji
o	Dodawania nowego
o	Listy wszystkich
•	CarImage, w tym:
o	Lista wszystkich
o	Pojedyncze zdjêcie
o	Nowe zdjêcie
•	Default, w tym:
o	Lista dostêpnych
o	Kontakt
o	Strona g³ówna
o	Rejestr wynajmów
•	Mail – widok formularza kontaktowego
•	Rent, w tym:
o	Moje wynajmy, lista
o	Nowego wynajmu
o	Zakoñczenie wynajmu
o	Potwierdzenie wynajmu
o	Wszystkich wynajmów
Inne:
•	Zdjêcia samochodów zapisywane s¹ w folderze „uploads/car_images”
•	Aplikacja pracuje w œrodowisku testowym, st¹d wymóg dodania „app_dev.php” do adresu



