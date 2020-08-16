## Defining Relationships

Database tables are often related to one another. For example, a blog post may have many comments, or an order could be related to the user who placed it. Eloquent makes managing and working with these relationships easy.
so go to App\User.php and add UserRelation

```php
<?php 
namespace App; 
use Illuminate\Notifications\Notifiable; 
use Illuminate\Foundation\Auth\User as Authenticatable; 
use yal\laraveldash\Traits\UserRelation; 
class User extends Authenticatable { 
    use Notifiable,UserRelation; 
}
```
