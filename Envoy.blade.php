@setup
  $appdir = '/Users/ywshin/development/LaravelStudy/blog-bamboo';
  $branch = 'master';
@endsetup

@servers(['web' => '192.168.10.11'])

@task('foo-real', ['on' => ['web']])
  echo 'Working on ' . `hostname`
  ls -al
@endtask

@task('pull-on-real')
    echo 'Working on ' . `hostname`
    cd {{ $appdir }}
    php artisan down
    git pull origin {{ $branch }}
    composer install
    php artisan up
    echo "rev hash: " `git rev-parse --verify HEAD`
@endtask

