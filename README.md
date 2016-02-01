Aplikacja wykorzystuje dwa g��wne Bundle  � u�ytkownika (UserBundle) i wypo�yczenia (RestAndDriveBundle). 
UserBundle
Kontrolery:
�	UserController � odpowiedzialny za wszystkie akcje zwi�zane z u�ytkownikiem
Typy:
�	User � definiuj�cy usera, zawiera pola takie jak:
o	Id
o	Samoch�d
o	Wypo�yczenia
o	IDsamochodu
Widoki:
�	Rejestracji
�	Logowania
�	Podgl�du u�ytkownika
RestAndDriveBundle:
Kontrolery:
�	CarController � odpowiedzialny za wszystkie akcje zwi�zane z samochodem
�	CarImageController � odpowiedzialny za wszystkie akcje zwi�zane ze zdj�ciami samochodu
�	RentController � odpowiedzialny za wszystkie akcje zwi�zane z wynajmem samochodu
�	DefaultController � odpowiedzialny za stron� g��wn�, kontakt, list� samochod�w i dawne transakcje wynajmu
Typy:
�	Car � definiuj�cy samoch�d, zawiera pola takie jak:
o	Wypo�yczenia
o	Zdj�cia
o	U�ytkownik
o	ID
o	Nazwa
o	Ilo�� miejsc
o	Cena
o	Dost�pno��
�	CarImage � definiuj�cy zdj�cia samochodu, zawiera pola takie jak:
o	Auto
o	ID
o	Zdj�cie
�	Kontakt � definiuj�cy wiadomo�� kontaktow�, zawiera pola takie jak:
o	Id
o	Nazwa (imi�)
o	Email
o	Wiadomo��
�	Rent � definiuj�cy wynajem, zawiera pola takie jak:
o	Auto
o	U�ytkownik
o	ID
o	Od
o	Do
o	Data zg�oszenia wynajmu
o	Cena wynajmu
o	Aktywny
Formularze:
�	CarImageType � do uploadu zdj�� samochodu
�	CarType � do definiowania samochod�w
�	ContactType � do definiowania wysy�ki wiadomo�ci kontaktowych
�	RentType � do definiowania wynajmu
�	SearchType � do definiowania wyszukiwania (filtrowania) samochodu
Widoki:
�	Car, w tym:
o	Pojedynczego samochodu
o	Edycji
o	Dodawania nowego
o	Listy wszystkich
�	CarImage, w tym:
o	Lista wszystkich
o	Pojedyncze zdj�cie
o	Nowe zdj�cie
�	Default, w tym:
o	Lista dost�pnych
o	Kontakt
o	Strona g��wna
o	Rejestr wynajm�w
�	Mail � widok formularza kontaktowego
�	Rent, w tym:
o	Moje wynajmy, lista
o	Nowego wynajmu
o	Zako�czenie wynajmu
o	Potwierdzenie wynajmu
o	Wszystkich wynajm�w
Inne:
�	Zdj�cia samochod�w zapisywane s� w folderze �uploads/car_images�
�	Aplikacja pracuje w �rodowisku testowym, st�d wym�g dodania �app_dev.php� do adresu



