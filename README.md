# Extension text

## Helpers
### is_json
Checks whether the row is Json object.
```php
is_json(json_encode(['test' => true])); 
// true
```

### lang_in_text
Applies special triggers of language variables.
```php
lang_in_text("Text: @validation.accepted"); 
// Text: The :attribute must be accepted.
```

### tag_replace
Invested tag replacement on the object values or array.
```php
tag_replace("Hello, {user.name} {user.lastname}. You phone: {phone}", [
    'user' => ['name' => 'Ivan', 'lastname' => 'Petrov'],
    'phone' => '123456789'
]); 
// Hello, Ivan Petrov. You phone: 123456789
```

### file_lines_get_contents
Get data from file by lines.
```php
file_lines_get_contents('LICENSE.md', 3, 3); 
//Copyright (c) 2021 BFG <bfg.script@gmail.com>
```
