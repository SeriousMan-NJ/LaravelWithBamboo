@setup
  $appdir = '/Users/ywshin/development/LaravelStudy/blog-bamboo';
  $branch = 'master';
@endsetup

@servers(['localhost' => 'localhost'])

@task('foo', ['on' => ['localhost']])
  echo 'Working on '`hostname`
  ls -al
@endtask

@task('deploy-on-localhost')
    echo 'Working on '`hostname`
    cd {{ $appdir }}
    php artisan down
    git pull origin {{ $branch }}
    composer install
    php artisan up
    echo "rev hash: " `git rev-parse --verify HEAD`
@endtask
