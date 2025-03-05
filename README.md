# EventManager

![Badge de Versão](https://img.shields.io/badge/vers%C3%A3o-1.0-blue)
![Badge de Build](https://img.shields.io/badge/build-passing-brightgreen)


## Descrição do Projeto

O **EventManager** é uma aplicação web desenvolvida para gerenciar eventos, permitindo cadastro, edição e exclusão de eventos, além de inscrições de participantes.

## Status do Projeto

![Badge de Status](https://img.shields.io/badge/status-em%20desenvolvimento-yellow)

## Funcionalidades

- Cadastro de eventos
- Edição de eventos
- Exclusão de eventos
- Inscrição de participantes
- Exclusão de participantes
- Listagem de eventos

## Pré-requisitos

Antes de começar, verifique se você atende aos seguintes requisitos:

- PHP 8.3.6
- Composer 2.8.6
- Laravel Installer ^5.12
- MySQL
- Apache (LAMP)

## Instalação

1. **Instalar PHP**:

    ```bash
    /bin/bash -c "$(curl -fsSL https://php.new/install/linux/8.4)"
    ```

2. **Instalar Composer e Laravel Installer**:

    ```bash
    composer global require laravel/installer
    ```

3. **Clonar o repositório**:

    ```bash
    git clone https://github.com/joaovflorisvaldo/eventManager.git
    cd eventManager
    ```

4. **Instalar as dependências**:

    ```bash
    composer install
    ```

5. **Configurar o arquivo `.env`**:

    Copie o arquivo `.env.example` para `.env` e configure as variáveis de ambiente, especialmente as informações do banco de dados.

6. **Executar as migrações**:

    ```bash
    php artisan migrate
    ```

7. **Iniciar o servidor**:

    ```bash
    php artisan serve
    ```

## Uso

Após a instalação, acesse `http://localhost:8000` em seu navegador para utilizar a aplicação.

## Testes

Para executar os testes automatizados, utilize:

```bash
php artisan test
```

## Tecnologias Utilizadas

- [Laravel](https://laravel.com/) - Framework PHP
- [Livewire](https://laravel-livewire.com/) - Framework full-stack para Laravel
- [Jetstream](https://jetstream.laravel.com/) - Pacote de scaffolding para Laravel

## Contribuição

Para contribuir com o **EventManager**, siga estas etapas:

1. Fork este repositório.
2. Crie uma branch: `git checkout -b minha-branch`.
3. Faça suas alterações e commit: `git commit -m 'Minha contribuição'`.
4. Envie para o branch original: `git push origin minha-branch`.
5. Crie um pull request.

## Licença

Este projeto está sob a licença MIT. Veja o arquivo [LICENSE](LICENSE) para mais detalhes.

## Autores

- [João Florisvaldo](https://github.com/joaovflorisvaldo)

## Referências

- [Documentação Oficial do Laravel](https://laravel.com/docs)
- [Documentação do Livewire](https://laravel-livewire.com/docs)
- [Documentação do Jetstream](https://jetstream.laravel.com/2.x/docs/installation.html)

