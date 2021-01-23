# Assessment - Answers

### Dependencies

* Laravel >= 8.0
* php >= 7.4
* [Composer](https://getcomposer.org/)


Install the dependencies by running
```
composer install
```


### Usage

Run command to start:

```
php artisan runcloud:assessment
```

## Expected Output
```
RunCloud Assestment !

Flow #1 Basic Plan Subscription !

Action: Subscribing to Plan Basic Plan ...
Subscribed to plan Basic Plan

Action: Connecting Server Server 1 ...
Action => Server Server 1 is connected !

+++ User's Name       : Ashraf Kamarudin
+++ Current Plan      : Basic Plan
+++ Connected Servers : Server 1 [192.168.0.1]

Action: Connecting Server Server 2 ...
Error => User Exceeded Server Limit allowed for plan Basic Plan ! 

Flow #2 Upgrade Plan Subscription !

Action: Subscribing to Plan Pro Plan ...
Subscribed to plan Pro Plan

Action: Connecting Server Server 2 ...
Action => Server Server 2 is connected !

+++ User's Name       : Ashraf Kamarudin
+++ Current Plan      : Pro Plan
+++ Connected Servers : Server 1 [192.168.0.1] , Server 2 [192.168.0.2]

Flow #3 Unsubscribe Plan Subscription !

Action: Cancelling Subscription to plan Pro Plan ...

Your have successfully unsubscribed from plan Pro Plan. 
Thank you for using RunCloud. 

Action: Connecting Server Server 2 ...
Error => User is not Subscribed to Any Plan 

```
