# Weekly Dev Task Sync

Welcome to the Weekly Dev Task Sync repository! This project is designed to efficiently manage and synchronize development tasks across teams on a weekly basis. Our aim is to provide a clear and organized overview of tasks, prioritizing them based on estimated duration and value, ensuring that developers are assigned tasks that are best suited to their schedule and expertise.

## Features

-   **Task Synchronization**: Sync tasks with developers for fastest way possible.
-   **Provider Filtering**: View tasks for a specific provider, or see an aggregated list.

## Getting Started

To get a local copy up and running follow these simple steps.

### Prerequisites

-   PHP >= 7.4
-   Laravel >= 8.x
-   MySQL or any SQL database that Laravel supports

## Setup

-   Clone the repository
-   Copy `.env.example` to `.env` and fill in your credentials
-   Run `composer install`
-   Run 'php artisan key:generate'
-   Run 'php artisan migrate --path=database\migrations\2023_12_17_013927_create_providers_table.php'
-   Run 'php artisan migrate'
-   Run 'php artisan db:seed'
-   Run 'php artisan serve'

## Usage

-   Go to `http://localhost:8000` main page
-   Click on developers section to see and edit developers
-   Click on providers section to see and edit providers
-   To fetch tasks from your providers, run `php artisan fetch-tasks`
-   Click on tasks section to see and generate schedule for providers or aggregated list

-   Example provider json responses are :

    -   `https://run.mocky.io/v3/27b47d79-f382-4dee-b4fe-a0976ceda9cd` for provider 1
    -   `https://run.mocky.io/v3/7b0ff222-7a9c-4c54-9396-0df58e289143` for provider 2

-   As you can see providers can send datas from another languages and we can handle it with our localization system. You just need to assign keys while adding the provider.

## Todos

-   Add tests
-   Add Error Handling
-   More detailed tables for lists
-   OpenAPI or Postman documentation
-   Authentication and Authorization
