プロジェクト初期構築
====================


<!-- @import "[TOC]" {cmd="toc" depthFrom=1 depthTo=6 orderedList=false} -->

<!-- code_chunk_output -->

- [Laravelインストール](#laravelインストール)
- [dockerファイルのカスタマイズ](#dockerファイルのカスタマイズ)
- [Laravel Breezeインストール](#laravel-breezeインストール)
- [開発用ツールインストール](#開発用ツールインストール)
  - [IDE Helper](#ide-helper)
  - [PHP_Codesniffer](#php_codesniffer)
- [プロジェクト設定](#プロジェクト設定)
  - [日本語化](#日本語化)
  - [タイムゾーン](#タイムゾーン)
  - [フォルダ権限](#フォルダ権限)

<!-- /code_chunk_output -->

## Laravelインストール

```bash
curl -s "https://laravel.build/sample?with=mysql,redis,mailhog" | bash
```

## dockerファイルのカスタマイズ

```bash
# sailで作成されたdockerファイルをプロジェクトフォルダ直下に配置
cd sample
./vendor/bin/sail artisan sail:publish
```

## Laravel Breezeインストール

```bash
# php containerに入る
make bash

# install
composer require laravel/breeze --dev

# リソースを公開
php artisan breeze:install

exit

# npmパッケージインストール & ビルド
make npm-install
make npm-dev
```

## 開発用ツールインストール

### IDE Helper

```bash
# php containerに入る
make bash

# インストール
composer require --dev barryvdh/laravel-debugbar
composer require --dev barryvdh/laravel-ide-helper

# idehelperファイル生成
php artisan ide-helper:generate

exit
```

### PHP_Codesniffer

```bash
# php containerに入る
make bash

# インストール
composer require squizlabs/php_codesniffer
composer require cakephp/cakephp-codesniffer

exit
```

## プロジェクト設定

### 日本語化

* config/app.php
    - 'locale' => 'en' => 'ja'に変更
    - 'faker_locale' => 'en' => 'ja_JP'に変更

```bash
# php containerに入る
make bash

php -r "copy('https://readouble.com/laravel/8.x/ja/install-ja-lang-files.php', 'install-ja-lang.php');"
php -f install-ja-lang.php
php -r "unlink('install-ja-lang.php');"

exit
```

### タイムゾーン

* config/app.php
    - 'timezone' => 'UTC' => 'Asia/Tokyo'に変更

### フォルダ権限

```bash
# container外で実行
cd sample
sudo chmod 777 -R storage bootstrap/cache
```
