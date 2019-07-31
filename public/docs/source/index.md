---
title: API Reference

language_tabs:
- bash
- javascript

includes:

search: true

toc_footers:
- <a href='http://github.com/mpociot/documentarian'>Documentation Powered by Documentarian</a>
---
<!-- START_INFO -->
# Info

Welcome to the generated API reference.
[Get Postman Collection](http://localhost/docs/collection.json)

<!-- END_INFO -->

#general
<!-- START_c3fa189a6c95ca36ad6ac4791a873d23 -->
## api/login
> Example request:

```bash
curl -X POST "/api/login" 
```

```javascript
const url = new URL("/api/login");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/login`


<!-- END_c3fa189a6c95ca36ad6ac4791a873d23 -->

<!-- START_61739f3220a224b34228600649230ad1 -->
## api/logout
> Example request:

```bash
curl -X POST "/api/logout" 
```

```javascript
const url = new URL("/api/logout");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/logout`


<!-- END_61739f3220a224b34228600649230ad1 -->

<!-- START_5d7543fa49fc5f2e6f70a990d6045ca8 -->
## api/login-refresh
> Example request:

```bash
curl -X POST "/api/login-refresh" 
```

```javascript
const url = new URL("/api/login-refresh");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/login-refresh`


<!-- END_5d7543fa49fc5f2e6f70a990d6045ca8 -->

<!-- START_b19e2ecbb41b5fa6802edaf581aab5f6 -->
## api/me
> Example request:

```bash
curl -X GET -G "/api/me" 
```

```javascript
const url = new URL("/api/me");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/me`


<!-- END_b19e2ecbb41b5fa6802edaf581aab5f6 -->

<!-- START_f126455f28d07eacd874e4ea04228192 -->
## api/all-events
> Example request:

```bash
curl -X GET -G "/api/all-events" 
```

```javascript
const url = new URL("/api/all-events");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
[
    {
        "id": 1,
        "user_id": 1,
        "name": "Event 2",
        "description": "Desc event 2",
        "cover_image": "2049155d40ad4b9ffdd.png",
        "published": 1,
        "created_at": "2019-07-30 20:41:05",
        "updated_at": "2019-07-31 04:18:23"
    },
    {
        "id": 7,
        "user_id": 1,
        "name": "Event 7",
        "description": "Desc event 7",
        "cover_image": "2042455d40abc50667e.png",
        "published": 1,
        "created_at": "2019-07-30 20:42:45",
        "updated_at": "2019-07-30 20:42:45"
    }
]
```

### HTTP Request
`GET api/all-events`


<!-- END_f126455f28d07eacd874e4ea04228192 -->

<!-- START_742a1cbd4a274c7269f0db99a704ff41 -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET -G "/api/events" 
```

```javascript
const url = new URL("/api/events");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/events`


<!-- END_742a1cbd4a274c7269f0db99a704ff41 -->

<!-- START_de3413bf02c9bb71627fa96e1c1c409f -->
## Store a newly created resource in storage.

> Example request:

```bash
curl -X POST "/api/events" 
```

```javascript
const url = new URL("/api/events");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/events`


<!-- END_de3413bf02c9bb71627fa96e1c1c409f -->

<!-- START_379a3beb17bbb91528d80d8507f69655 -->
## Display the specified resource.

> Example request:

```bash
curl -X GET -G "/api/events/1" 
```

```javascript
const url = new URL("/api/events/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/events/{event}`


<!-- END_379a3beb17bbb91528d80d8507f69655 -->

<!-- START_d16967fd1d3d935666f7e8112a1a4451 -->
## Update the specified resource in storage.

> Example request:

```bash
curl -X PUT "/api/events/1" 
```

```javascript
const url = new URL("/api/events/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/events/{event}`

`PATCH api/events/{event}`


<!-- END_d16967fd1d3d935666f7e8112a1a4451 -->

<!-- START_379a30feb2949828b5f95efbfd7649c3 -->
## Remove the specified resource from storage.

> Example request:

```bash
curl -X DELETE "/api/events/1" 
```

```javascript
const url = new URL("/api/events/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE api/events/{event}`


<!-- END_379a30feb2949828b5f95efbfd7649c3 -->

<!-- START_87407392d114f4cc54c5147293bc7648 -->
## api/event/{id}/publish
> Example request:

```bash
curl -X GET -G "/api/event/1/publish" 
```

```javascript
const url = new URL("/api/event/1/publish");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/event/{id}/publish`


<!-- END_87407392d114f4cc54c5147293bc7648 -->

<!-- START_64619604fed2255fa320d9c32ca81d87 -->
## api/event/{id}/unpublish
> Example request:

```bash
curl -X GET -G "/api/event/1/unpublish" 
```

```javascript
const url = new URL("/api/event/1/unpublish");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/event/{id}/unpublish`


<!-- END_64619604fed2255fa320d9c32ca81d87 -->


