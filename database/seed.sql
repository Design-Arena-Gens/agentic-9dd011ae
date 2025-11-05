INSERT INTO users (name, email, password_hash, role) VALUES
('Fleet Admin', 'admin@drivenow.local', '$2y$10$di4ufADG7n2AFDzy83H8E.DbnrFzAAkwYZSP5MAECSiylPPTk42Ba', 'admin'),
('Taylor Swift', 'taylor@example.com', '$2y$10$di4ufADG7n2AFDzy83H8E.DbnrFzAAkwYZSP5MAECSiylPPTk42Ba', 'customer');

INSERT INTO cars (name, type, license_plate, rate_per_km, status, image_url) VALUES
('Tesla Model 3', 'Electric Sedan', 'EV-4012', 1.75, 'available', 'https://images.unsplash.com/photo-1511396275278-7afc7a1f47f1'),
('Toyota Highlander', 'SUV', 'SUV-8841', 1.25, 'maintenance', 'https://images.unsplash.com/photo-1549921296-3ecf9c2c1309'),
('Mercedes S-Class', 'Premium', 'VIP-2020', 2.85, 'available', 'https://images.unsplash.com/photo-1503376780353-7e6692767b70');

INSERT INTO bookings (user_id, car_id, pickup_location, destination, distance_km, estimated_fare, status) VALUES
(2, 1, 'Downtown Hub', 'Airport Terminal 1', 25.0, 43.75, 'completed'),
(2, 3, 'Conference Center', 'Hotel Luxe', 8.5, 24.23, 'pending');
