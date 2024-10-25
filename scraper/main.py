from typing import Union
import requests

from fastapi import FastAPI
from pydantic import BaseModel
from recipe_scrapers import scrape_html

app = FastAPI()

class RecipeRequest(BaseModel):
    url: str

@app.post("/recipe")
def create_recipe(request: RecipeRequest):
    html = requests.get(request.url, headers={"User-Agent": "Recipe Seeker"}).content
    scraper = scrape_html(html, org_url=request.url)
    return {
        "image": scraper.image(),
        "ingredients": scraper.ingredients(),
        "instructions": scraper.instructions_list(),
        "nutrients": scraper.nutrients(),
        "title": scraper.title(),
        "total_time": scraper.total_time(),
        "yields": scraper.yields(),
    }
