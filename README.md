# Guia de Instalação do Ambiente Laravel

## Requisitos

- PHP 8.3.6
- Composer 2.8.6
- Laravel Installer ^5.12
- MySQL
- Apache (LAMP)

## Passos para Instalação

### 1. Instalar PHP

```bash
/bin/bash -c "$(curl -fsSL https://php.new/install/linux/8.4)"
```

### 2. Instalar Composer e Laravel Installer

Caso já tenha PHP e Composer instalados, instale o instalador do Laravel:

```bash
composer global require laravel/installer
```

### 3. Iniciar o Servidor Laravel

```bash
php artisan serve
```

### 4. Instalar MySQL

```bash
sudo apt install mysql-server -y
```

### 5. Instalar Apache (LAMP)

```bash
sudo apt install lamp-server^
```

---

Esse documento será atualizado com mais informações futuramente.

