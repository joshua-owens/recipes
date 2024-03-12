FROM golang:1.22
WORKDIR /usr/src/app
COPY go.mod ./
COPY cmd/recipes ./
RUN go mod download && go mod verify
RUN go build -v -o /usr/local/bin/recipes ./...
CMD ["recipes"]