insert into client(Surname, Name, patronymic, Phone, Address, Service) values ("Луговая", "Оксана", "Петровна", 79123 , "Ленина 8", "Маникюр");
insert into client(Surname, Name, patronymic, Phone, Address, Service) values ("Кобыльская", "Валерия", "Андреевна", 79321 , "Октябрьская 3", "Причёски");
insert into specialties(Code, Title) values(1, "Парикмахер");
insert into specialties(Code, Title) values(2, "Мастер маникюра");
insert into specialties(Code, Title) values(3, "Мастер педикюра");
insert into schedule(Date, Time) values("2022-05-18", "18:50");
insert into schedule(Date, Time) values("2022-05-19", "15:50");
insert into client(Surname, Name, Patronymic, Phone, Address, Service, Experience, id_schedule, id_specialties) values ("Щербакова", "Айлин", "Никитична", 79321 , "Октябрьская 3", "Причёски", 10, 1, 1);
insert into client(Surname, Name, Patronymic, Phone, Address, Service, Experience, id_schedule, id_specialties) values ("Сафонов", "Марк", "Глебович", 79321 , "Октябрьская 3", "Педикюр", 10, 2, 2);
insert into client(Surname, Name, Patronymic, Phone, Address, Service, Experience, id_schedule, id_specialties) values ("Антонина", "Ксения", "Игоревна", 79321 , "Октябрьская 3", "Маникюр", 10, 1, 3);
