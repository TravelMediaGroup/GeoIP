HEADER := sed "s/^/------> /"
INDENT := sed "s/^/        /"

update-database:
	@echo "Downloading current MaxMind database..." |$(HEADER)
	@wget http://geolite.maxmind.com/download/geoip/database/GeoLite2-City.mmdb.gz -P db/ -q |$(INDENT)
	@echo "Removing existing MaxMind database..." |$(HEADER)
	@rm -rf db/GeoLite2-City.mmdb |$(INDENT)
	@echo "Extracting MaxMind database..." |$(HEADER)
	@gunzip db/GeoLite2-City.mmdb.gz |$(INDENT)
