# Simple Notification Bar

A lightweight WordPress plugin that adds a customizable notification bar to the top of your website. Perfect for displaying announcements, promotions, or alerts to your visitors.

<img width="1583" height="797" alt="Screenshot" src="https://github.com/user-attachments/assets/8caf03cd-cc7d-44ae-a0e9-bf7d499085f6" />

## 🚀 Features

- Simple and lightweight
- Customizable text, background color, and text color
- Options page under WordPress Settings
- Uses WordPress Options API and Color Picker
- Clean and responsive design

## 🛠️ Installation

1. Download the latest release: [simple-notification-bar.zip](https://github.com/cryptoball7/simple-notification-bar/releases)
2. Go to your WordPress admin panel
3. Navigate to **Plugins → Add New → Upload Plugin**
4. Upload the ZIP file and activate the plugin
5. Go to **Settings → Notification Bar** to customize

## ⚙️ Settings

You can customize:
- Notification text
- Background color
- Text color

## 🧩 How It Works

The plugin injects a `div` at the top of your site using the `wp_body_open` hook. All customization is handled via the WordPress admin panel using the Options API.

## 📂 File Structure

```
simple-notification-bar/
├── simple-notification-bar/
│ ├── css/
│ | └── notification-bar.css
| ├── js/
│ | └── snb-admin.js
| └── simple-notification-bar.php
├── LICENSE
└── README.md
```

## 🖼️ Screenshot

<img width="1583" height="797" alt="Screenshot" src="https://github.com/user-attachments/assets/8caf03cd-cc7d-44ae-a0e9-bf7d499085f6" />

## 📜 License

This plugin is open-source and distributed under the [GNU GPLv3 License](https://github.com/cryptoball7/simple-notification-bar/blob/main/LICENSE).


---

**Created by Cryptoball7**

