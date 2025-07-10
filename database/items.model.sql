CREATE TABLE IF NOT EXISTS items (
    id UUID PRIMARY KEY DEFAULT gen_random_uuid(),
    item_name VARCHAR(150) NOT NULL,
    description TEXT,
    quantity INTEGER DEFAULT 0,
    price NUMERIC(10, 2) NOT NULL,
    category VARCHAR(100),
    status VARCHAR(50) DEFAULT 'available',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
