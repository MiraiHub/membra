FROM node:22
LABEL authors="grolandao@miraihub"

WORKDIR /app

RUN yarn global add @quasar/cli

COPY ./frontend/package.json ./frontend/yarn.lock ./

RUN yarn install

COPY ./frontend/. .

RUN usermod -u 1000 node
RUN groupmod -g 1000 node

RUN chown -R node:node /app

USER node

EXPOSE 8080

CMD ["quasar", "dev", "-p", "8080", "-H", "0.0.0.0"]