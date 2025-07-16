
## RouteMatrix
Detailed Feature Outline & Database Models
Feature	Description & DB Models
GPS/Telematics Integration	Description: Store, process, and analyze real-time and historical GPS and telematics data from vehicles.
Models:
- Vehicle
- TelematicsRecord
TelematicsRecord fields: id, vehicle_id (FK), latitude, longitude, speed, fuel_level, engine_rpm, recorded_at (timestamp), created_at, updated_at
Relations:
Vehicle hasMany TelematicsRecord
Notes: Data imported via API or device integration, optimized for large writes and time-series queries.
Multi-role Access Control	Description: Assign multiple roles per user with permissions to control access and operations.
Models:
- User
- Role
- Permission (optional, for finer control)
- Pivot tables: role_user, permission_role
User Fields: id, name, email, password, ...
Role Fields: id, name, description
Permission Fields: id, name, description
Relations:
User belongsToMany Role
Role belongsToMany Permission
Notes: Use packages like Laravel Breeze/Jetstream + Spatie’s Laravel Permission for implementation.
Vehicle & Asset Management	Description: CRUD operations on vehicles/assets, track status, ownership, and assignment.
Models:
- Vehicle
- VehicleType
- Asset (e.g., GPS devices, trailers)
- Driver (User with role driver)
Vehicle Fields: id, name, registration_number, status (active/inactive), vehicle_type_id (FK), current_driver_id (FK), purchase_date, odometer
Relations:
Vehicle belongsTo VehicleType
Vehicle belongsTo Driver (User)
Notes: May include vehicle documents (registration, insurance), with document expiry reminders.
Maintenance Scheduling	Description: Preventive and corrective maintenance scheduling, logs, parts inventory.
Models:
- MaintenanceSchedule
- MaintenanceRecord
- Part
- Vehicle (FK)
MaintenanceSchedule Fields: id, vehicle_id, description, scheduled_date, status
MaintenanceRecord Fields: id, schedule_id, performed_by (User), performed_at, notes, cost
Part Fields: id, name, quantity_in_stock, reorder_level
Relations:
Vehicle hasMany MaintenanceSchedule
MaintenanceSchedule hasOne MaintenanceRecord
Notes: Trigger notifications before scheduled date/time, track maintenance costs.
Fuel/Expense Reporting	Description: Log fuel purchases, other expenses; analyze consumption and costs.
Models:
- FuelEntry
- Expense
- Vehicle (FK)
FuelEntry Fields: id, vehicle_id, date, liters, price_per_liter, total_cost, odometer_reading
Expense Fields: id, vehicle_id, date, expense_type (fuel, toll, repair), amount, description
Relations:
Vehicle hasMany FuelEntry and Expense
Notes: Integrate fuel card data imports, generate consumption reports.
Incident & Compliance Tracking	Description: Track accidents, violations, inspections, compliance with laws/regulations.
Models:
- Incident
- ComplianceDocument
- Vehicle (FK)
- Driver (User)
Incident Fields: id, vehicle_id, driver_id, type (accident, violation), date, description, status
ComplianceDocument Fields: id, vehicle_id, document_type, issue_date, expiry_date, status
Relations:
Vehicle hasMany Incident, ComplianceDocument
Driver hasMany Incident
Notes: Automated expiry alerts, attach photos or documents.
Route Planning & Dispatch	Description: Create/manage routes, assign trips, dispatch vehicles and drivers, handle requests.
Models:
- Route
- Trip
- TransportRequest
- Vehicle (FK)
- Driver (User FK)
Route Fields: id, origin, destination, distance, estimated_duration
Trip Fields: id, route_id, scheduled_start, scheduled_end, vehicle_id, driver_id, status
TransportRequest Fields: id, user_id (who made request), trip_id (nullable), status (pending/approved/rejected), requested_date
Relations:
Trip belongsTo Route, Vehicle, Driver
TransportRequest belongsTo User, optionally Trip
Notes: Integrate optimization algorithms, driver mobile notifications.
Real-time Alerts/Notifications	Description: Alert users about maintenance, incidents, requests, compliance, or real-time GPS events.
Models:
- Notification
- AlertType
- User (receivers)
Notification Fields: id, user_id, alert_type_id, message, read_at, created_at
AlertType Fields: id, name, description
Relations:
User hasMany Notification
Notes: Real-time push via WebSocket/Pusher, SMS or WhatsApp gateway integration.
Open API/Integrations	Description: Expose RESTful API endpoints for fleet data, integrates with third-party systems.
Models:
- Standard models as above exposed via API
- API tokens managed via PersonalAccessToken model (Laravel Sanctum)
Notes: Secured with OAuth2/Sanctum, versioned routes, throttling and documentation (Swagger/OpenAPI).
Analytics/Dashboards	Description: Aggregated KPIs, charts, reports on fleet utilization, costs, compliance, and driver performance.
Models:
- Aggregate data queried via live joins/ETL or stored in summary tables (optional)
- Models as above feeding into reporting views
Examples:
- FleetUtilization (denormalized)
- CostReport
Notes: Use Laravel Nova, custom dashboard UI with charts (Chart.js, D3.js), caching for performance.
