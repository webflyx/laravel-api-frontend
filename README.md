<h2>Application features:</h2>
<ul>
<li>Register User</li>
<li>Login</li>
<li>Logout</li>
<li>CRUD orders</li>
<li>Parse crypto prices (sail artisan app:parse-prices)</li>
<li>Send alerts if current price >= user order price (sail artisan app:send-alerts)</li>
</ul>

<h2>Check List:</h2>
<ul>
<li>authentication - sanctum</li>
<li>authorization/policies/gates - use for CRUD orders</li>
<li>CRUD - orders</li>
<li>middleware - use 'auth:sanctum'</li>
<li>queues - use for send alert for users, command "sail artisan app:send-alerts"</li>
<li>cache - use for /orders/index</li>
<li>third-party API - use coingecko API for parse prices, command "sail artisan app:parse-prices"</li>
</ul>
