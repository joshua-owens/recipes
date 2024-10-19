FROM node:22-slim

WORKDIR /client

COPY package.json /client/
COPY package-lock.json /client/

RUN npm install

COPY . /client/

EXPOSE 3000

CMD ["npm", "run", "dev"]