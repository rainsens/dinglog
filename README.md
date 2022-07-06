<p align="center"><code>dinglog</code> is provided pushing Laravel logs and exceptions to DingTalk message.</p>

## Requirements

* PHP >= 7.1
* Laravel >= 5.5.0

## Installation

First, install laravel >= 5.5.

```
composer require rainsens/dinglog
```

Then run following command to publish config.

```
php artisan vendor:publish --provider="Rainsens\Dinglog\DinglogServiceProvider"
```

## Usage

> This package currently only support sending text,link and markdown 3 types of message.

Push text message.

```
Dinglog::text($message)
```

Push link message.

```
Dinglog::link($message)
```

Push markdown message.

```
Dinglog::markdown($message)
```

## License
`dinglog` is licensed under [The MIT License (MIT)](LICENSE).
