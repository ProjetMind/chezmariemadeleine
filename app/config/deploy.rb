set :application, "cmm"
set :domain,      "chezmariemadeleine.com"
set :deploy_to,   "/var/www/cmm"
#set :app_path,    "app"
#set :web_path,    "web"
#set :user, "root"

set :writable_dirs,       ["app/cache", "app/logs"]
set :shared_files,      ["app/config/parameters.yml"]
set :shared_children,     [app_path + "/logs", "vendor"]
set :use_composer, true
set :update_vendors, true
set :dump_assetic_assets, false
 
set :repository,  "https://github.com/ProjetMind/chezmariemadeleine.git"
#set :repository,  "/Users/nsi/Sites/chezmariemadeleine"
set :scm,         :git
set :deploy_via, :remote_cache
#set :deploy_via, :rsync_with_remote_cache
#set   :branch,        "prod"
# Or: `accurev`, `bzr`, `cvs`, `darcs`, `subversion`, `mercurial`, `perforce`, or `none`

# Use copy to bypass firewall...
set :copy_strategy, :export
set :copy_cache, "/tmp/#{application}"
set :copy_exclude, [".git/*"]
set :copy_compression, :gzip

set :model_manager, "doctrine"
# Or: `propel`

role :web,        domain                         # Your HTTP server, Apache/etc
role :app,        domain, :primary => true       # This may be the same as your `Web` server

set  :keep_releases,  3

# Be more verbose by uncommenting the following line
logger.level = Logger::MAX_LEVEL

after "deploy" do
    run "cd #{latest_release} && pwd && php app/console cache:clear -e prod && chmod -R 777 app/cache && chmod -R 777 app/logs"
end