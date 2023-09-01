-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Сен 01 2023 г., 18:39
-- Версия сервера: 10.6.7-MariaDB-log
-- Версия PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `mycar`
--

-- --------------------------------------------------------

--
-- Структура таблицы `body_type`
--

CREATE TABLE `body_type` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `body_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `body_type`
--

INSERT INTO `body_type` (`id`, `body_type`, `created_at`, `updated_at`) VALUES
(1, 'Седан', '2023-08-21 15:19:58', '2023-08-21 15:22:41'),
(2, 'Купе', '2023-08-21 16:27:15', '2023-08-21 16:27:15'),
(3, 'Внедорожник 3 дв.', '2023-08-22 16:26:37', '2023-08-22 16:26:37'),
(4, 'Внедорожник 5 дв.', '2023-08-22 16:26:53', '2023-08-22 16:26:53'),
(5, 'Кабриолет', '2023-08-22 16:27:03', '2023-08-22 16:27:03'),
(6, 'Пикап', '2023-08-22 16:27:16', '2023-08-22 16:27:16'),
(7, 'Универсал', '2023-08-22 16:27:26', '2023-08-22 16:27:26'),
(8, 'Хэтчбек 3 дв.', '2023-08-22 16:27:41', '2023-08-22 16:27:50'),
(9, 'Хэтчбек 5 дв.', '2023-08-22 16:28:01', '2023-08-22 16:28:01');

-- --------------------------------------------------------

--
-- Структура таблицы `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `brands`
--

INSERT INTO `brands` (`id`, `brand_name`, `created_at`, `updated_at`) VALUES
(1, 'Audi', '2023-08-21 16:25:09', '2023-08-21 16:25:09'),
(2, 'BMW', '2023-08-21 16:25:21', '2023-08-21 16:25:21'),
(3, 'Acura', '2023-08-22 15:56:41', '2023-08-22 15:56:41'),
(4, 'Alfa-Romeo', '2023-08-22 15:56:55', '2023-08-22 15:56:55'),
(5, 'Cadillac', '2023-08-22 15:57:08', '2023-08-22 15:57:08'),
(6, 'Chevrolet', '2023-08-22 15:57:17', '2023-08-22 15:57:17'),
(7, 'Chrysler', '2023-08-22 15:57:29', '2023-08-22 15:57:29'),
(8, 'Citroen', '2023-08-22 15:57:46', '2023-08-22 15:57:46'),
(9, 'Dodge', '2023-08-22 15:57:53', '2023-08-22 15:57:53'),
(10, 'Fiat', '2023-08-22 15:58:03', '2023-08-22 15:58:03'),
(11, 'Ford', '2023-08-22 15:58:10', '2023-08-22 15:58:10'),
(12, 'Honda', '2023-08-22 15:58:26', '2023-08-22 15:58:26'),
(13, 'Volvo', '2023-08-22 15:58:39', '2023-08-22 15:58:39'),
(14, 'Tesla', '2023-08-22 15:58:51', '2023-08-22 15:58:51'),
(15, 'Nissan', '2023-08-22 15:59:08', '2023-08-22 15:59:08'),
(16, 'Skoda', '2023-08-29 17:04:13', '2023-08-29 17:04:13'),
(17, 'Mercedes-Benz', '2023-08-30 07:46:28', '2023-08-30 07:46:28'),
(18, 'MINI', '2023-08-30 07:55:12', '2023-08-30 07:55:12');

-- --------------------------------------------------------

--
-- Структура таблицы `call_requests`
--

CREATE TABLE `call_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `car_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `call_requests`
--

INSERT INTO `call_requests` (`id`, `name`, `email`, `phone`, `car_id`, `created_at`, `updated_at`) VALUES
(19, 'Admin', 'games.soroko@mail.ru', '375292892546', 4, '2023-08-29 15:39:23', '2023-08-29 15:39:23'),
(21, 'Admin', 'games.soroko@mail.ru', '375292892546', 4, '2023-08-29 16:50:58', '2023-08-29 16:50:58');

-- --------------------------------------------------------

--
-- Структура таблицы `cars`
--

CREATE TABLE `cars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand_id` bigint(20) UNSIGNED NOT NULL,
  `model` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `car_mileage` int(11) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `color_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `body_type_id` bigint(20) UNSIGNED NOT NULL,
  `drive_system_id` bigint(20) UNSIGNED NOT NULL,
  `engine_type_id` bigint(20) UNSIGNED NOT NULL,
  `transmission_type_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `cars`
--

INSERT INTO `cars` (`id`, `brand_id`, `model`, `year`, `car_mileage`, `description`, `image`, `price`, `category_id`, `color_id`, `created_at`, `updated_at`, `body_type_id`, `drive_system_id`, `engine_type_id`, `transmission_type_id`) VALUES
(1, 1, 'A6', '2003', 327000, 'Автомобиль в собственности с 2016 года. Своевременное обслуживание, бережная эксплуатация. Последнее ТО 10000 км назад (комплект ГРМ, масло, фильтра, тормозная жидкость) Замена масла АКПП на пробеге 316640 км. Новый АКБ. 2 ключа. Тех. осмотр до 10.02.2024 г. -громкая связь Двигатель: 1.9 Дизель Трансмиссия: Вариатор Привод: Передний', '3tkYKt1Ye8BgWsD5LMwUSjZVdRjo5TxTtbGDKYTJ.jpg', 8700.00, 2, 3, '2023-08-21 11:57:16', '2023-08-21 11:57:16', 1, 1, 1, 2),
(2, 12, 'Pilot II', '2008', 228000, 'Автомобиль в собственности с 2020 года. Третий собственник в РБ. Оригинальный пробег, бережная эксплуатация. Последнее ТО 3000 км назад (масло , фильтра) Замена комплекта ГРМ 4000 км назад. 2 ключа. Двигатель: 3.5 Бензин Трансмиссия: АКПП Привод: Подключаемый полный', 'CfNU6XZwvq9ZC4gIFmYIifAoSJ1Y2Q4MI3snTGRT.jpg', 15550.00, 2, 3, '2023-08-21 12:57:16', '2023-08-21 12:57:16', 4, 3, 1, 1),
(3, 11, 'Mondeo IV', '2007', 219000, 'Третий владелец. Своевременное обслуживание. Последнее ТО 800 км назад (масло, фильтра) Замена комплекта ГРМ 1500 км назад. 2 ключа. Двигатель: 1.6 Бензин Трансмиссия: МКПП Привод: Передний', 'd0SRoTeMrnP7FLN3vrpoRCvps3mN8jIJ2umbkIJW.jpg', 7700.00, 2, 3, '2023-08-21 14:57:16', '2023-08-21 14:57:16', 1, 1, 1, 2),
(4, 13, 'S60 II', '2011', 247000, 'Автомобиль в хорошем состоянии. Весь авто в родной краске, кроме переднего правого крыла (вторичный окрас), 100% оригинальный пробег (подтверждается по заказ-нарядам. У собственника в пользовании с 2015 года. Пригнан из Бельгии. Максимальная комплектация: подогрев и память передних сидений, кожаный салон темного цвета, громкая связь, круиз-контроль, хорошая музыка и т.д. Своевременное обслуживание на СТО имеются все заказ-наряды, 8 т.км назад заменено масло и фильтра в двигателе, 30 т.км назад заменено масло в АКПП и тормозные диски с колодками, 70 т.км назад заменен комплект ГРМ с водяным насосом и всех роликов, 2 ключа. Двигатель: 1.6 бензин Трансмиссия: Автоматическая Привод: передний', 's52hikKUwkxxvBjqyDhETeJwShsxzBKEWuI0lkpw.jpg', 10900.00, 2, 3, '2023-08-21 15:57:16', '2023-08-21 15:57:16', 1, 1, 1, 1),
(5, 16, 'Octavia III', '2014', 216520, 'Автомобиль в собственности с 2018 года, 1 владелец в РБ. Своевременное обслуживание, есть все подтверждающие документы. Установлена подвеска Euro Sport (пружины с занижением и амортизаторы). Хорошая комплектация: -адаптивный Bi ксенон -раздельный климат -датчик света/дождя -парктроники перед/зад -обогрев сидений перед/зад и д.р. Есть комплект зимней резины на оригинальных литых дисках R16, резина BFGOODRICH Двигатель: 1.4 Бензин Трансмиссия: Робот Привод: Передний', 'vId1dnE9B82liMt7y1CwzzLdCVCIGkkCNioUukPc.jpg', 13350.00, 2, 4, '2023-08-29 17:08:06', '2023-08-29 17:08:06', 1, 1, 1, 1),
(6, 11, 'Edge II', '2020', 31680, 'Автомобиль пригонялся из США. Оригинальный Ford edge ST. Без пробега по РБ. Оригинальный пробег , Последнее ТО 150 км назад (масло, фильтра ) Вся безопасность восстановлена. Максимальная комплектация. Двигатель: 2.7 Бензин Трансмиссия: АКПП Привод : Полный', '87sPxGl0DVnmapBlcxOI4WbFT87qYh0uHJYutHpJ.jpg', 39900.00, 2, 1, '2023-08-29 17:18:55', '2023-08-29 17:18:55', 4, 3, 1, 1),
(7, 17, 'CLA', '2019', 219960, 'Автомобиль пригонялся из Европы. Два владельца в РБ. Оригинальный пробег, заводское ЛКП. Последнее ТО проведено 7000 км назад(заменены все расходники в ДВС и КПП). Датчики давления в шинах. Bluetooth, интерфейс App-Connect (Apple Carplay, Android Auto, Mirrorlink). Датчики света и дождя. Все ассистенты для помощи водителю (мёртвые зоны, распознавание знаков и т.д.) Распознавание усталости. Двигатель: 1.5 Дизель Трансмиссия: АКПП(робот) Привод: Передний', 'Ft9Qf9GEzaOyztmdV7o4iFalXjDCLu15wSYcpqXz.jpg', 34400.00, 2, 4, '2023-08-30 07:48:08', '2023-08-30 08:30:09', 7, 1, 3, 1),
(8, 18, 'Cooper R56', '2008', 105921, 'Оригинальный JOHN COOPER WORKS, 211 лс с завода. Автомобиль в собственности с 2016 года. Своевременное обслуживание, бережная эксплуатация. Последнее ТО 1500 км назад, заменены масло в ДВС и фильтра. Двигатель: 1.6 Бензин Трансмиссия: МКПП Привод: Передний', '0gh5Jxu5F3zS1X7dI7dp10nz1RjoOuTqSRdwD3gn.jpg', 9700.00, 2, 2, '2023-08-30 07:56:57', '2023-08-30 07:56:57', 3, 1, 1, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `car_user_like`
--

CREATE TABLE `car_user_like` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `car_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `car_user_like`
--

INSERT INTO `car_user_like` (`id`, `car_id`, `user_id`, `created_at`, `updated_at`) VALUES
(14, 1, 3, NULL, NULL),
(65, 7, 1, NULL, NULL),
(66, 8, 1, NULL, NULL),
(67, 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `created_at`, `updated_at`) VALUES
(1, 'Новое авто', '2023-08-21 16:26:26', '2023-08-21 16:26:26'),
(2, 'Авто с пробегом', '2023-08-21 16:26:34', '2023-08-21 16:26:34');

-- --------------------------------------------------------

--
-- Структура таблицы `colors`
--

CREATE TABLE `colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `color_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `colors`
--

INSERT INTO `colors` (`id`, `color_name`, `created_at`, `updated_at`) VALUES
(1, 'Белый', '2023-08-21 16:27:33', '2023-08-21 16:27:33'),
(2, 'Красный', '2023-08-21 16:27:44', '2023-08-21 16:27:44'),
(3, 'Черный', '2023-08-21 16:27:50', '2023-08-21 16:27:50'),
(4, 'Серый', '2023-08-29 17:06:46', '2023-08-29 17:06:46');

-- --------------------------------------------------------

--
-- Структура таблицы `drive_system`
--

CREATE TABLE `drive_system` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `drive_system` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `drive_system`
--

INSERT INTO `drive_system` (`id`, `drive_system`, `created_at`, `updated_at`) VALUES
(1, 'Передний привод', '2023-08-21 15:44:15', '2023-08-21 15:44:15'),
(2, 'Задний привод', '2023-08-21 15:45:57', '2023-08-21 15:48:13'),
(3, 'Полный привод', '2023-08-21 15:48:24', '2023-08-21 15:48:24');

-- --------------------------------------------------------

--
-- Структура таблицы `engine_type`
--

CREATE TABLE `engine_type` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `engine_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `engine_type`
--

INSERT INTO `engine_type` (`id`, `engine_type`, `created_at`, `updated_at`) VALUES
(1, 'Бензин', '2023-08-21 16:02:17', '2023-08-21 16:02:17'),
(2, 'Бензин (пропан-бутан)', '2023-08-21 16:03:15', '2023-08-21 16:04:22'),
(3, 'Дизель', '2023-08-30 07:49:38', '2023-08-30 07:49:38');

-- --------------------------------------------------------

--
-- Структура таблицы `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(4, '2023_07_27_193619_create_categories_table', 1),
(5, '2023_07_29_092306_create_colors_table', 1),
(6, '2023_07_31_135237_create_brand_table', 1),
(7, '2023_08_03_134609_create_users_table', 1),
(8, '2023_08_03_134807_add_suename_address_age_gender_into_users', 1),
(9, '2023_08_03_140955_password_confirmation_into_users', 1),
(10, '2023_08_03_154640_create_cars_table', 1),
(11, '2023_08_07_185102_add_references_into_cars', 1),
(12, '2023_08_15_113848_add_role_to_user_table', 1),
(13, '2023_08_18_193809_add_body_type_car_mileage_drive_system_engine_type_doors_to_cars_table', 1),
(14, '2023_08_21_161948_create_body_type_table', 1),
(15, '2023_08_21_165122_create_drive_system_table', 1),
(16, '2023_08_21_165156_create_engine_type_table', 1),
(17, '2023_08_21_165239_create_transmission_type_table', 1),
(18, '2023_08_21_171137_add_references_into_cars_table', 1),
(19, '2023_08_23_174027_create_car_user_like_table', 2),
(20, '2023_08_23_174206_add_references_to_car_user_like_tablу', 2),
(22, '2023_08_28_120247_add_phone_number_to_users_tabl', 3),
(23, '2023_08_28_124841_create_call_requests_table', 4);

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `transmission_type`
--

CREATE TABLE `transmission_type` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `transmission_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `transmission_type`
--

INSERT INTO `transmission_type` (`id`, `transmission_type`, `created_at`, `updated_at`) VALUES
(1, 'Автомат', '2023-08-21 16:21:33', '2023-08-21 16:21:59'),
(2, 'Механика', '2023-08-21 16:21:46', '2023-08-21 16:21:46');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `surname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `age` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password_confirmation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `surname`, `age`, `gender`, `address`, `password_confirmation`, `phone`) VALUES
(1, 'Admin', 'admin@mail.ru', 'admin', NULL, '$2y$10$KflfbywPpQBJGk4UkZ3yz..AkpljVS2pYsW3UkKHgR1IO3OaD1fMe', '3ZXSpxqE7UM1wSbEZJ8WtK8g5lE679epsXr79z7AdyMsujbkEOKNAoawuDBX', '2023-08-21 14:51:57', '2023-08-21 14:51:57', NULL, NULL, NULL, NULL, NULL, ''),
(2, 'Andrew', 'games.soroko@mail.ru', 'user', NULL, '$2y$10$Z2i7SEnrsEV2NMxCPcHxUOaxTgPgF4jcDuKfNTWQI/zQUM171p8oK', NULL, '2023-08-23 14:16:22', '2023-08-23 14:16:22', NULL, NULL, NULL, NULL, NULL, ''),
(3, 'Andrew', 'awerwe@mail.ru', 'user', NULL, '$2y$10$8jajjq4a660fgebwEsXgquQTwJPB3du/Yu.CL8ANvgbMX/VqbxJTG', NULL, '2023-08-23 14:18:09', '2023-08-23 14:18:09', NULL, NULL, NULL, NULL, NULL, ''),
(5, 'Андрей', 'andriei.soroko@mail.ru', 'user', NULL, '$2y$10$MUWkhd6D1uN0jdVVZuvDFeutHCXRm2FsyEVTP6I20lxvG1EwYAePi', NULL, '2023-08-28 09:28:53', '2023-08-28 09:28:53', NULL, NULL, NULL, NULL, NULL, '375292892546');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `body_type`
--
ALTER TABLE `body_type`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `call_requests`
--
ALTER TABLE `call_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `call_requests_car_id_foreign` (`car_id`);

--
-- Индексы таблицы `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cars_brand_id_foreign` (`brand_id`),
  ADD KEY `cars_category_id_foreign` (`category_id`),
  ADD KEY `cars_color_id_foreign` (`color_id`),
  ADD KEY `cars_body_type_id_foreign` (`body_type_id`),
  ADD KEY `cars_drive_system_id_foreign` (`drive_system_id`),
  ADD KEY `cars_engine_type_id_foreign` (`engine_type_id`),
  ADD KEY `cars_transmission_type_id_foreign` (`transmission_type_id`);

--
-- Индексы таблицы `car_user_like`
--
ALTER TABLE `car_user_like`
  ADD PRIMARY KEY (`id`),
  ADD KEY `car_user_like_car_id_foreign` (`car_id`),
  ADD KEY `car_user_like_user_id_foreign` (`user_id`);

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `drive_system`
--
ALTER TABLE `drive_system`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `engine_type`
--
ALTER TABLE `engine_type`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Индексы таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Индексы таблицы `transmission_type`
--
ALTER TABLE `transmission_type`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `body_type`
--
ALTER TABLE `body_type`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT для таблицы `call_requests`
--
ALTER TABLE `call_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT для таблицы `cars`
--
ALTER TABLE `cars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `car_user_like`
--
ALTER TABLE `car_user_like`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `colors`
--
ALTER TABLE `colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `drive_system`
--
ALTER TABLE `drive_system`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `engine_type`
--
ALTER TABLE `engine_type`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT для таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `transmission_type`
--
ALTER TABLE `transmission_type`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `call_requests`
--
ALTER TABLE `call_requests`
  ADD CONSTRAINT `call_requests_car_id_foreign` FOREIGN KEY (`car_id`) REFERENCES `cars` (`id`);

--
-- Ограничения внешнего ключа таблицы `cars`
--
ALTER TABLE `cars`
  ADD CONSTRAINT `cars_body_type_id_foreign` FOREIGN KEY (`body_type_id`) REFERENCES `body_type` (`id`),
  ADD CONSTRAINT `cars_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`),
  ADD CONSTRAINT `cars_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `cars_color_id_foreign` FOREIGN KEY (`color_id`) REFERENCES `colors` (`id`),
  ADD CONSTRAINT `cars_drive_system_id_foreign` FOREIGN KEY (`drive_system_id`) REFERENCES `drive_system` (`id`),
  ADD CONSTRAINT `cars_engine_type_id_foreign` FOREIGN KEY (`engine_type_id`) REFERENCES `engine_type` (`id`),
  ADD CONSTRAINT `cars_transmission_type_id_foreign` FOREIGN KEY (`transmission_type_id`) REFERENCES `transmission_type` (`id`);

--
-- Ограничения внешнего ключа таблицы `car_user_like`
--
ALTER TABLE `car_user_like`
  ADD CONSTRAINT `car_user_like_car_id_foreign` FOREIGN KEY (`car_id`) REFERENCES `cars` (`id`),
  ADD CONSTRAINT `car_user_like_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
