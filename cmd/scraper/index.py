import grpc
from concurrent import futures
from recipe_scrapers import scrape_me
import recipe_pb2 
import recipe_pb2_grpc

class RecipeServiceServicer(recipe_pb2_grpc.RecipeServiceServicer):
    def GetRecipe(self, request, context):
        recipe = scrape_me(request.url, wild_mode=True)
        return recipe_pb2.RecipeResponse(
            title=recipe.title(),
            ingredients='\n'.join(recipe.ingredients()),
            instructions=recipe.instructions()
        )

def serve():
    server = grpc.server(futures.ThreadPoolExecutor(max_workers=10))
    recipe_pb2_grpc.add_RecipeServiceServicer_to_server(RecipeServiceServicer(), server)
    server.add_insecure_port('[::]:50051')
    server.start()
    server.wait_for_termination()

if __name__ == '__main__':
    serve()