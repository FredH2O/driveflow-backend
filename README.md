# Driveflow Backend

WordPress backend for the Driveflow project.

## Overview

Driveflow uses a headless WordPress architecture.

This repository contains only the custom WordPress files located inside the `wp-content` directory. The core WordPress files are intentionally excluded from version control.

WordPress is used as a content management system (CMS) and exposes content through the WordPress REST API for the React frontend application.

## Tech Stack

- WordPress
- PHP
- MySQL
- WordPress REST API

## Features

- Custom Services Post Type
- Custom Driveflow plugin
- REST API content delivery
- WordPress Admin content management

## Repository Structure

```text
wp-content/
├── plugins/
│   └── driveflow-core/
├── themes/
└── README.md
```

## Local Development

### Requirements

- LocalWP
- PHP
- MySQL

### Setup

1. Create a WordPress site using LocalWP.
2. Copy the contents of this repository into the site's `wp-content` directory.
3. Start the site.
4. Activate the Driveflow plugin from the WordPress Admin dashboard.

## API

Example endpoint:

```text
/wp-json/wp/v2/services
```

The Driveflow frontend consumes data from these endpoints.

## Learning Goals

This project was created to practice:

- WordPress development
- PHP fundamentals
- Custom plugin development
- Custom Post Types
- REST API integration
- Headless CMS architecture
