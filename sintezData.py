from faker import Faker
import pandas as pd
import random
from transliterate import translit

fake = Faker("ru_RU")

statusVariable = ['Не в работе', 'Отказ', 'Завершено']
accNumber = []
firstName  = []
lastName  = []
patronymic  = []
birthday = []
inn = []
fioResp  = []
status = []
fioRespAuth  = []
login = []
password = []
translitLogin =''

#Синтез данных для таблицы пользователей
for i in range(30): 
    
    password.append(fake.password(length=10, special_chars=False))
    fioRespAuth.append(fake.name())
    translitLogin = translit(fioRespAuth[i].split()[0], language_code='ru', reversed=True)
    login.append(translitLogin+str(random.randint(100,999)))
    
    
users = {
    "Логин": pd.Series(login),
    "Пароль": pd.Series(password),
    "ФИО ответственного": pd.Series(fioRespAuth),
   
}

usersDataFrame = pd.DataFrame(users)

#Синтез данных для таблицы клиентов
for i in range(500):
    #номер счета
    accNumber.append(fake.checking_account())
    #ФИО
    randomNum = random.choice([1,2])
    if(randomNum)==1:
        firstName.append(fake.first_name_male())
        lastName.append(fake.last_name_male())
        patronymic.append(fake.middle_name_male())
    else:
        firstName.append(fake.first_name_female())
        lastName.append(fake.last_name_female())
        patronymic.append(fake.middle_name_female())
    #Дата рождения
    birthday.append(fake.date_of_birth(minimum_age= 18, maximum_age= 80))
    #ИНН
    inn.append(fake.businesses_inn())
    #ФИО
    fioResp.append(random.choice(usersDataFrame["ФИО ответственного"]))
    #Статус Не в работе, Отказ, завершено
    status.append(random.choice(statusVariable))

clients = {
    "Номер счета": pd.Series(accNumber),
    "Фамилия": pd.Series(lastName),
    "Имя": pd.Series(firstName),
    "Отчество": pd.Series(patronymic),
    "Дата рождения": pd.Series(birthday),
    "ИНН": pd.Series(inn),
    "ФИО ответственного": pd.Series(fioResp),
    "Статус": pd.Series(status),
}

clientsDataFrame = pd.DataFrame(clients)

#Сохранение таблиц в формате csv
clientsDataFrame.to_csv('clients.csv', index=False, encoding = 'cp1251') 
usersDataFrame.to_csv('users.csv', index=False, encoding = 'cp1251') 

