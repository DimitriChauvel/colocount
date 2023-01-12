FROM node:19.3.0 as build
COPY package.json .
COPY package-lock.json .
RUN npm install

COPY public public
COPY src src
RUN npm run build

FROM caddy:2.6.2
COPY --from=build build /srv
COPY docker/caddy/Caddyfile /etc/caddy/Caddyfile
