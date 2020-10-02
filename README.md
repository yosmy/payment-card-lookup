# Play

cd play

export UID
export GID
docker-compose \
-f docker/all.yml \
-p yosmy_payment_card_lookup \
up -d \
--remove-orphans --force-recreate

docker exec -it yosmy_payment_card_lookup_php sh

php play/bin/app.php /iannuttall/resolve-lookup 12345678

docker-compose \
-f docker/all.yml \
-p yosmy_payment_card_lookup \
stop