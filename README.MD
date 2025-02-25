# ✈️ Welcome to Eliptic Airlines ✈️

This project aims to develop a web platform for Eliptic Airlines, allowing users to browse available flights for purchase.

Additionally, it includes an administrative system to manage the company’s fleet, accessible through a dedicated admin interface (API).

---

## Overview
The web page has the following views:

- **Home View**:
<img src="https://res.cloudinary.com/dq2kswexq/image/upload/v1740487685/ElipticAirlines/qgjamaku5crrntq6o5of.png">

- **Flights View fo Users/Guests**:
<img src="https://res.cloudinary.com/dq2kswexq/image/upload/v1740487817/ElipticAirlines/qz1xn2o9wsskr7rhgjdd.png">

- **Flights View For Admin**:
<img src="https://res.cloudinary.com/dq2kswexq/image/upload/v1740487942/ElipticAirlines/htgnjwtvznylbwpfi26b.png">

- **Airplanes View Only For Admin**:
<img src="https://res.cloudinary.com/dq2kswexq/image/upload/v1740488021/ElipticAirlines/bqgp7x3nrogvwevo4obf.png">

- **Contact View**:
![image](https://github.com/user-attachments/assets/25a83372-fd0c-4b58-8421-1d1a30ea3fc5)

## 🛠️🚀 Tech Stack

### **Languages**:
- HTML
- Blade (Laravel template engine)

### **Frameworks**:
- Laravel
- TailwindCSS
- FlowBite

### **Server**:
- XAMPP
- Apache
- Node.js

### **Database**:
- MySQL

### **Tools & Others**:
- Composer
- Postman

## 📊📁 DB Diagram
Below is a diagram of the database, showing different relationships between tables:

- **Airplane - Flight:** One to many relationship. An Airplane can have many Flights, but each Flight belongs to only one Airplane.

- **Users Table:** Table that registers all the users in the web page.

![image](https://github.com/user-attachments/assets/3cad9253-daea-4694-ac95-e16904fa381c)

## 🔧⚙️ Installation

Follow these steps to install and set up the project:

- Clone the repository
```
https://github.com/SantiVigna/ElipticAirlines.git
```

- Install Composer dependencies

```
composer install
```
- Install Node.js dependencies

```
npm install
```
- Duplicate .env.example file and rename to .env
- In this new .env, change the variables you need, but it is very important to uncomment the database connection lines that are these:
 
In DB_CONNECTION will come mysqlite, change it to the db you use (in this case MySQL)

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=elipticairlines
DB_USERNAME=root
DB_PASSWORD=
```
 - Generate an App Key with this command 
```
php artisan key:generate 
```
- Create the ElipticAirlines DB in your SQL Database program, if you dont do this the app wont work

- Execute migrations  
```
php artisan migrate
```

## ▶️💻 Run Locally
- How to run the Laravel server  
```
php artisan serve
```

- If you want to run all this in development environment run the following command  
```
npm run dev
```

- For production you should run the following command 
```
npm run build
```

## 🏃‍♂️🧪 Running Tests

To run test you should uncomment the following lines on the phpunit.xml file.

![image](https://res.cloudinary.com/dierpqujk/image/upload/v1733829455/imagen_2024-12-10_121742908_b3mfqm.png)


With the following command we run the tests and we will also generate a coverage report, the first one in the terminal, and the second one a html coverage report

```bash
  php artisan test --coverage
```

```bash
  php artisan test --coverage-html=coverage-report
```

If everything is configured correctly, tests should pass, and the coverage report will show `87,3` coverage approximately.

#### Test Summary:
<img src="https://res.cloudinary.com/dq2kswexq/image/upload/v1740488240/ElipticAirlines/zxeyfkhos7fwvjz45mzf.png">

#### Coverage Folder:
<img src="https://res.cloudinary.com/dq2kswexq/image/upload/v1740488354/ElipticAirlines/ibfelbjgunhd3ivwlt3u.png">

## 📡🌐 Eliptic Airlines API

This API allows you to manage the crud from Airplanes and Flights.

### Airplanes

#### 1 Get all airplanes entries

```http
GET /api/airplanes
```

#### Response:
- **Status Code:** 200
- **Content Type:** application/json

#### 2 Get an airplane by ID

```http
GET /api/airplanes/id
```

| Parameter | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `id`      | `integer` | **Required**. Airplane ID     |

#### Response:
- **Status Code:** 200, 404
- **Content Type:** application/json

#### 3 Create a new airplane

```http
POST /api/airplanes
```

#### Response:
- **Status Code:** 201
- **Content Type:** application/json

#### Body: 

| Parameter | Type     | Description                    |
| :-------- | :------- | :-------------------------     |
| `registration` | `string` | **Required**. Identification of the Airplane    |
| `model` | `string` | **Required**. Model of the Airplane |
| `capacity` | `integer` | **Required**. Capacity of people that the airplane can have  |
| `autonomy` | `integer` | **Required**. Quantity of KM that can travel  |
| `image` | `string` | **Required**. Image of the Airplane  |

#### 4 Update an existing airplane by ID

```http
PUT /api/airplanes/id
```

| Parameter | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `id`      | `integer` | **Required**. Airplane ID     |

#### Response:
- **Status Code:** 200, 404
- **Content Type:** application/json

#### Body: 

| Parameter | Type     | Description                    |
| :-------- | :------- | :-------------------------     |
| `registration` | `string` | Identification of the Airplane    |
| `model` | `string` | Model of the Airplane |
| `capacity` | `integer` | Capacity of people that the airplane can have  |
| `autonomy` | `integer` | Quantity of KM that can travel  |
| `image` | `string` | Image of the Airplane  |

#### 5 Delete an Airplane by ID

```http
DELETE /api/airplanes/id
```

| Parameter | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `id`      | `integer` | **Required**. Airplane ID     |

#### Response:
- **Status Code:** 200, 404
- **Content Type:** application/json

### Kid

#### 1 Get all flights entries

```http
GET /api/flights
```

#### Response:
- **Status Code:** 200
- **Content Type:** application/json

#### 2 Get a flight by ID

```http
GET /api/flights/id
```

| Parameter | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `id`      | `integer` | **Required**. Flight ID     |

#### Response:
- **Status Code:** 200, 404
- **Content Type:** application/json

#### 3 Create a new flight

```http
POST /api/flights
```

#### Response:
- **Status Code:** 201
- **Content Type:** application/json

#### Body: 

| Parameter | Type     | Description                    |
| :-------- | :------- | :-------------------------     |
| `flight_number` | `string` | **Required**. Identification of the Flight |
| `departure` | `string` | **Required**. Place of departure of the flight |
| `arrival` | `string` | **Required**. Place of arrival of the flight  |
| `departure_time` | `string` | **Required**. Time of the Departure  |
| `arrival_time` | `string` | **Required**. Time of the Arrival  |
| `distance` | `integer` | **Required**. Distance from Departure to Arrival place  |
| `price` | `integer` | **Required**. Price of the Flight |
| `airplane_id` | `integer` | **Required**. Airplane assigned to the flight  |

#### 4 Update an existing flight by ID

```http
PUT /api/flights/id
```

| Parameter | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `id`      | `integer` | **Required**. Flight ID     |

#### Response:
- **Status Code:** 200, 404
- **Content Type:** application/json

#### Body: 

| Parameter | Type     | Description                    |
| :-------- | :------- | :-------------------------     |
| `flight_number` | `string` | Identification of the Flight |
| `departure` | `string` | Place of departure of the flight |
| `arrival` | `string` | Place of arrival of the flight  |
| `departure_time` | `string` | Time of the Departure  |
| `arrival_time` | `string` | Time of the Arrival  |
| `distance` | `integer` | Distance from Departure to Arrival place  |
| `price` | `integer` |Price of the Flight |
| `airplane_id` | `integer` | Airplane assigned to the flight  |

#### 5 Delete a Flight by ID

```http
DELETE /api/flights/id
```

| Parameter | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `id`      | `integer` | **Required**. Flight ID     |

#### Response:
- **Status Code:** 200, 404
- **Content Type:** application/json

## ✍️🙍 Author

- **Santino Vigna:**
[![GitHub](https://img.shields.io/badge/GitHub-Perfil-black?style=flat-square&logo=github)](https://github.com/SantiVigna)
[![LinkedIn](https://img.shields.io/badge/LinkedIn-Perfil-blue?style=flat-square&logo=linkedin)](www.linkedin.com/in/miguel-garcía-lópez-609136284)
[![Correo](https://img.shields.io/badge/Email-Contacto-red?style=flat-square&logo=gmail)](mailto:ynotvigna@gmail.com)

