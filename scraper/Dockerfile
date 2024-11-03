
FROM python:3.12


WORKDIR /scraper


COPY ./requirements.txt /scraper/requirements.txt
COPY ./requirements-dev.txt /scraper/requirements-dev.txt


RUN pip install --no-cache-dir --upgrade -r /scraper/requirements.txt
RUN pip install --no-cache-dir --upgrade -r /scraper/requirements-dev.txt


COPY . /scraper

EXPOSE 4000


CMD ["fastapi", "dev", "main.py", "--host", "0.0.0.0", "--port", "4000"]