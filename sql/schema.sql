-- Schema SQL pour Supabase (création des tables users, products, contact_messages)
-- Colle ce fichier dans Supabase SQL Editor ou exécute-le via un job CI.

-- Activer l'extension pour générer des UUID (nécessaire une seule fois)
create extension if not exists pgcrypto;

-- Table users (profil utilisateur)
create table if not exists public.users (
  id uuid primary key default gen_random_uuid(),
  email varchar(255) not null unique,
  full_name varchar(255),
  role varchar(50) default 'user',
  metadata jsonb,
  created_at timestamptz not null default now()
);

-- Table products
create table if not exists public.products (
  id bigserial primary key,
  slug varchar(255) not null unique,
  name varchar(255) not null,
  short_description varchar(512),
  description text,
  price numeric(10,2) not null default 0.00,
  currency varchar(10) not null default 'USD',
  available boolean not null default true,
  created_at timestamptz not null default now(),
  updated_at timestamptz not null default now()
);

-- Table contact_messages (formulaire de contact)
create table if not exists public.contact_messages (
  id bigserial primary key,
  name varchar(255),
  email varchar(255) not null,
  subject varchar(255),
  message text not null,
  handled boolean not null default false,
  created_at timestamptz not null default now()
);

-- Indexes pour accélérer les recherches courantes
create index if not exists idx_products_slug on public.products(slug);
create index if not exists idx_contact_messages_email on public.contact_messages(email);
create index if not exists idx_contact_messages_created_at on public.contact_messages(created_at);
create index if not exists idx_users_email on public.users(email);

-- Exemples d'insertion (décommenter si tu veux insérer des données de test)
-- insert into public.products (slug, name, short_description, price)
-- values ('donation-pack-1', 'Pack Don', 'Pack de donation simple', 10.00);

-- insert into public.contact_messages (name, email, subject, message)
-- values ('Jean', 'jean@example.com', 'Question', 'Bonjour, je veux aider.');
