# RoutMatrix
---

### 🧭 RouteMatrix – Feature Overview & Data Models

RouteMatrix is a comprehensive Fleet Management and Transport Booking System, designed to manage everything from GPS tracking to dispatch, maintenance, and analytics.

---

## 🔍 Feature Overview & Key Models

### 📡 GPS/Telematics Integration

**Description:** Store, process, and analyze real-time and historical telematics data.

**Models:**

* `Vehicle`
* `TelematicsRecord`

**TelematicsRecord Fields:**

* `id`, `vehicle_id (FK)`, `latitude`, `longitude`, `speed`, `fuel_level`, `engine_rpm`, `recorded_at`, `created_at`, `updated_at`

**Relationships:**

* `Vehicle` hasMany `TelematicsRecord`

**Notes:**

* Data imported via APIs/device integration.
* Optimized for large volume writes and time-series queries.

---

### 🔐 Multi-role Access Control

**Description:** Support multiple roles per user with permission control.

**Models:**

* `User`
* `Role`
* `Permission` (optional)
* Pivot tables: `role_user`, `permission_role`

**Key Fields:**

* `User`: `id`, `name`, `email`, `password`, ...
* `Role`: `id`, `name`, `description`
* `Permission`: `id`, `name`, `description`

**Relationships:**

* `User` belongsToMany `Role`
* `Role` belongsToMany `Permission`

**Notes:**

* Recommended packages: Laravel Breeze/Jetstream + [Spatie Laravel Permission](https://github.com/spatie/laravel-permission)

---

### 🚗 Vehicle & Asset Management

**Description:** Manage vehicles, their types, and assign drivers.

**Models:**

* `Vehicle`
* `VehicleType`
* `Asset` (e.g., GPS units, trailers)
* `Driver` (as a `User` with `driver` role)

**Key Fields for Vehicle:**

* `id`, `name`, `registration_number`, `status`, `vehicle_type_id`, `current_driver_id`, `purchase_date`, `odometer`

**Relationships:**

* `Vehicle` belongsTo `VehicleType`
* `Vehicle` belongsTo `Driver (User)`

**Notes:**

* Include compliance documents like registration/insurance with expiry notifications.

---

### 🔧 Maintenance Scheduling

**Description:** Handle preventive and corrective maintenance.

**Models:**

* `MaintenanceSchedule`
* `MaintenanceRecord`
* `Part`
* `Vehicle`

**Key Fields:**

* `MaintenanceSchedule`: `vehicle_id`, `description`, `scheduled_date`, `status`
* `MaintenanceRecord`: `schedule_id`, `performed_by (User)`, `performed_at`, `notes`, `cost`
* `Part`: `name`, `quantity_in_stock`, `reorder_level`

**Relationships:**

* `Vehicle` hasMany `MaintenanceSchedule`
* `MaintenanceSchedule` hasOne `MaintenanceRecord`

**Notes:**

* Trigger alerts before scheduled maintenance.
* Track part usage and inventory levels.

---

### ⛽ Fuel & Expense Reporting

**Description:** Track fuel usage, costs, and general vehicle expenses.

**Models:**

* `FuelEntry`
* `Expense`
* `Vehicle`

**Key Fields:**

* `FuelEntry`: `vehicle_id`, `date`, `liters`, `price_per_liter`, `total_cost`, `odometer_reading`
* `Expense`: `vehicle_id`, `date`, `expense_type`, `amount`, `description`

**Relationships:**

* `Vehicle` hasMany `FuelEntry`, `Expense`

**Notes:**

* Can import data from fuel cards.
* Generate consumption/cost reports.

---

### 🚨 Incident & Compliance Tracking

**Description:** Manage vehicle incidents, violations, and regulatory compliance.

**Models:**

* `Incident`
* `ComplianceDocument`
* `Vehicle`
* `Driver (User)`

**Key Fields:**

* `Incident`: `vehicle_id`, `driver_id`, `type`, `date`, `description`, `status`
* `ComplianceDocument`: `vehicle_id`, `document_type`, `issue_date`, `expiry_date`, `status`

**Relationships:**

* `Vehicle` hasMany `Incident`, `ComplianceDocument`
* `Driver` hasMany `Incident`

**Notes:**

* Document/photo uploads supported.
* Auto reminders for document expiration.

---

### 📍 Route Planning & Dispatch

**Description:** Plan and manage routes, trips, and trip requests.

**Models:**

* `Route`
* `Trip`
* `TransportRequest`
* `Vehicle`
* `Driver (User)`

**Key Fields:**

* `Route`: `origin`, `destination`, `distance`, `estimated_duration`
* `Trip`: `route_id`, `scheduled_start`, `scheduled_end`, `vehicle_id`, `driver_id`, `status`
* `TransportRequest`: `user_id`, `trip_id`, `status`, `requested_date`

**Relationships:**

* `Trip` belongsTo `Route`, `Vehicle`, `Driver`
* `TransportRequest` belongsTo `User`, optionally `Trip`

**Notes:**

* Can integrate optimization logic.
* Real-time dispatching via driver mobile app.

---

### 🔔 Real-time Alerts & Notifications

**Description:** Push alerts for events like incidents, maintenance, or compliance issues.

**Models:**

* `Notification`
* `AlertType`
* `User`

**Key Fields:**

* `Notification`: `user_id`, `alert_type_id`, `message`, `read_at`, `created_at`
* `AlertType`: `name`, `description`

**Relationships:**

* `User` hasMany `Notification`

**Notes:**

* Can be pushed via WebSockets, SMS, or WhatsApp APIs.

---

### 🌐 Open API & Integrations

**Description:** RESTful APIs for external system integration.

**Models:**

* All core models as needed
* `PersonalAccessToken` (Laravel Sanctum)

**Notes:**

* OAuth2 or Sanctum-based authentication
* Supports versioning, throttling, and OpenAPI documentation

---

### 📊 Analytics & Dashboards

**Description:** Monitor KPIs with charts and reporting dashboards.

**Models:**

* `FleetUtilization`, `CostReport` (denormalized or summarized data)
* All core models feed into analytics views

**Notes:**

* Use Laravel Nova or custom dashboards with Chart.js/D3.js
* Apply caching for heavy reporting

---

## Core Models & Relationships

| **Model Name**              | **Description & Key Relationships**                                                                                                                                                 |
| --------------------------- | ----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| **User**                    | Represents system users: Admins, Dispatchers, Drivers, Technicians. <br>**Relationships:** many-to-many with `Role`, one-to-many with `Trip`, `Incident`.                           |
| **Role**                    | Defines roles like admin, driver, etc. <br>**Relationships:** many-to-many with `User`, many-to-many with `Permission` (optional).                                                  |
| **Permission** *(Optional)* | Granular permissions for roles. <br>**Relationships:** many-to-many with `Role`.                                                                                                    |
| **Vehicle**                 | Core asset: trucks, cars, vans, etc. <br>**Relationships:** belongs to `VehicleType`, `Driver (User)`; has many `TelematicsRecord`, `MaintenanceSchedule`, `FuelEntry`, `Incident`. |
| **VehicleType**             | Categorizes vehicles (e.g., truck, van). <br>**Relationships:** one-to-many with `Vehicle`.                                                                                         |
| **TelematicsRecord**        | GPS & telematics data: `latitude`, `longitude`, `speed`, `fuel_level`, `timestamp`. <br>**Relationships:** belongs to `Vehicle`.                                                    |
| **DriverProfile**           | Extends driver information from `User` or links to it. Stores licensing and profile details.                                                                                        |
| **MaintenanceSchedule**     | Preventive maintenance plan for each vehicle. <br>**Relationships:** belongs to `Vehicle`.                                                                                          |
| **MaintenanceRecord**       | Completed maintenance entries. <br>**Relationships:** references `MaintenanceSchedule`; belongs to `User (technician)`.                                                             |
| **Part**                    | Inventory items for maintenance (e.g., oil filters). Tracks stock quantity and reorder levels.                                                                                      |
| **FuelEntry**               | Logs for fuel purchases. <br>**Attributes:** `vehicle_id`, `quantity`, `price`, `odometer`.                                                                                         |
| **Expense**                 | Tracks general vehicle-related expenses like tolls, repairs, fuel.                                                                                                                  |
| **Incident**                | Accident or violation reports. <br>**Relationships:** linked to `Vehicle`, `Driver`.                                                                                                |
| **ComplianceDocument**      | Stores regulatory documents (e.g., insurance, licenses) with expiration tracking. Linked to either `Vehicle` or `Driver`.                                                           |
| **Route**                   | Defines a transport route: `origin`, `destination`, `distance`, `estimated_time`.                                                                                                   |
| **Trip**                    | Represents scheduled or ongoing trips. <br>**Relationships:** belongs to `Route`, `Vehicle`, and `Driver`.                                                                          |
| **TransportRequest**        | Submitted by users requesting trips. <br>**Relationships:** assigned to a `Trip` once approved.                                                                                     |
| **Notification**            | System-generated alerts for users (e.g., maintenance due, GPS alerts).                                                                                                              |
| **AlertType**               | Categorizes system alerts (e.g., compliance, trip update, maintenance).                                                                                                             |
| **PersonalAccessToken**     | Laravel Sanctum model. Manages secure API access tokens.                                                                                                                            |


| **Model Name**        | **Purpose**                                                                              |
| --------------------- | ---------------------------------------------------------------------------------------- |
| **DriverSchedule**    | Stores driver working hours and shift information. Related to `DriverProfile` or `User`. |
| **VehicleAssignment** | Tracks vehicle-to-driver assignments in cases of shared or temporary usage.              |
| **Seat**              | Seat details for passenger vehicles. Linked to `Vehicle` or `Trip`.                      |
| **Booking**           | For user trip reservations. Links `User` to `Trip`, includes seat info, payment, status. |

