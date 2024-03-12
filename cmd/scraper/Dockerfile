FROM python:3.12

WORKDIR /app

COPY cmd/scraper/requirements.txt ./
RUN pip install --no-cache-dir -r requirements.txt

COPY cmd/scraper/ ./

CMD ["python", "index.py"]