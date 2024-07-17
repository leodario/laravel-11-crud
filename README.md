# Incluindo tabela e banco de dados
```
php artisan migrate
```
# Listar comandos do artisan
```
php artisan
php artisan list
```
# Criando Controller
```
php artisan make:controller <nome-do-controller>
```
# Criando uma view
```
php artisan make:view <nome-da-view>
```
# Dando start no servidor com o artisan
```
php artisan serve
```

# Criando um model
```
php artisan make:model <nome-do-model>
```
# Criando request
```
php artisan make:request <nome-do-request>
```
# Módulo de linguagem pt-BR (português brasileiro) para Laravel 
[https://github.com/lucascudo/laravel-pt-BR-localization](https://github.com/lucascudo/laravel-pt-BR-localization)

No arquivo ClienteController.php 
Na linha ->paginate() você determina a quantidade de linhas que aparece na mesma página
```
// buscar informações do nosso banco de dados
        $cliente = Cliente::where('nome','like', '%' . $termoDePesquisa . '%')
        ->orWhere('cpf', 'like', '%' . $termoDePesquisa . '%')
        ->orWhere('fone', 'like', '%' . $termoDePesquisa . '%')
        ->orWhere('email', 'like', '%' . $termoDePesquisa . '%')
        ->orderByDesc('created_at')
        ->paginate(1)
        ->withQueryString();
```
