
FROM python:3.12


WORKDIR /scraper


COPY ./requirements.txt /scraper/requirements.txt


RUN pip install --no-cache-dir --upgrade -r /scraper/requirements.txt


COPY . /scraper

EXPOSE 4000


CMD ["fastapi", "dev", "main.py", "--host", "0.0.0.0", "--port", "4000"]