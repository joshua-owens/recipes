FROM golang:1.22
WORKDIR /usr/src/app
COPY go.mod go.sum ./
COPY cmd/web ./
RUN go mod download && go mod verify
RUN go build -v -o /usr/local/bin/web ./...
CMD ["web"]