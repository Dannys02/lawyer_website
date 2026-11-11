# Nurul Safii & Partners Law Office Website

[Versi Bahasa Indonesia](README.id.md)

## Overview
This platform is the official digital portal for the Law Office of Nurul Safii, S.H., M.H., C.MSP & Partners. It serves as an authoritative legal information service, corporate profile, publication archive, and direct consultation channel.

## Problems Solved
- **Limited Access to Reliable Legal Information:** Provides public access to verified legal opinions, scholarly journals, legal news, and firm practice areas.
- **Consultation Barriers:** Simplifies direct contact with licensed advocates via official WhatsApp routing and an interactive AI legal assistant powered by Google Gemini.
- **Information Fragmentation:** Offers a centralized administrative CMS to manage firm profiles, publications, gallery archives, client reviews, and social media links.
- **Client Privacy Protection:** Strict role-based backend controls and public-only AI data boundary ensure private user and administrative credentials remain inaccessible.

## Key Features
- **Public Interface:** Service catalog, advocate profiles, searchable legal opinions, scientific journals with PDF downloads, news archives, and responsive gallery.
- **AI Virtual Legal Assistant:** Integrated with Gemini 3.1 Flash Lite, grounded exclusively on public database content with strict daily query rate limits.
- **Administrative Control Panel:** Dynamic management of articles, news, journals, legal partnerships, galleries, firm about page, social media, and client reviews.

## How to Use

### Prerequisites
- PHP >= 8.1
- Composer
- Node.js & NPM
- MySQL database

### Setup Instructions
1. Clone the repository and navigate to the project directory:
   ```bash
   git clone <repository_url>
   cd lawyer
   ```
2. Install dependencies:
   ```bash
   composer install
   npm install
   ```
3. Environment Configuration:
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```
   Set your database credentials and Gemini API key in `.env`:
   ```env
   DB_DATABASE=lawyer
   DB_USERNAME=root
   DB_PASSWORD=

   API_GEMINI_KEY=your_gemini_api_key
   GEMINI_MODEL=gemini-3.1-flash-lite
   GEMINI_DAILY_LIMIT=10
   ```
4. Run migrations and link storage:
   ```bash
   php artisan migrate
   php artisan storage:link
   ```
5. Build frontend assets and start local servers:
   ```bash
   npm run build
   php artisan serve
   ```

### User Navigation
- **Public Visitors:** Access `http://127.0.0.1:8000` to browse legal services, read publications, initiate consultations, or interact with the AI assistant via the floating action menu.
- **Administrators:** Log in at `/login` to access the admin dashboard (`/home`) and manage content across all publishing and profile modules.
