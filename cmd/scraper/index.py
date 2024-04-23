from recipe_scrapers import scrape_me

recipe = scrape_me("https://www.budgetbytes.com/slow-cooker-chicken-tikka-masala/", wild_mode=True)

print(recipe.to_json())