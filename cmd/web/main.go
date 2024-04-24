package main

import (
	"html/template"
	"io"
	"log"
	"net/http"

	pb "recipes.jowens.dev/internal/protos"

	"github.com/labstack/echo/v4"
	"github.com/labstack/echo/v4/middleware"
	"google.golang.org/grpc"
)

const (
	address    = "localhost:50051"
	defaultURL = "https://www.budgetbytes.com/not-butter-chicken/"
)

type Templates struct {
	templates *template.Template
}

func (t *Templates) Render(w io.Writer, name string, data interface{}, c echo.Context) error {
	return t.templates.ExecuteTemplate(w, name, data)
}

func newTemplate() *Templates {
	return &Templates{
		templates: template.Must(template.ParseGlob("views/*.html")),
	}
}

type Page struct {
	Title string
}

func main() {
	conn, err := grpc.Dial(address, grpc.WithInsecure(), grpc.WithBlock())
	if err != nil {
		log.Fatalf("did not connect: %v", err)
	}
	defer conn.Close()
	c := pb.NewRecipeServiceClient(conn)

	e := echo.New()

	e.Renderer = newTemplate()

	e.Use(middleware.Logger())
	e.Use(middleware.Recover())
	e.Static("/dist", "dist")

	e.GET("/", func(c echo.Context) error {
		return c.Render(200, "index.html", Page{Title: "Hello, Chef"})
	})

	e.GET("/recipe", func(context echo.Context) error {
		r, err := c.GetRecipe(context.Request().Context(), &pb.RecipeRequest{Url: defaultURL})
		if err != nil {
			log.Fatalf("could not get recipe: %v", err)
		}
		return context.JSON(http.StatusOK, r)
	})

	e.Logger.Fatal(e.Start(":8080"))
}
