import sys
import json
import joblib

# تحميل النماذج
svm_model = joblib.load('C:/Users/Lenovo/Desktop/course laravel/TenderLaravel/ai/svm_model.joblib')
scaler = joblib.load('C:/Users/Lenovo/Desktop/course laravel/TenderLaravel/ai/scaler.joblib')

input_json = sys.stdin.read()
bids_data = json.loads(input_json)

features = []
contractor_ids = []
bid_ids = []

for bid in bids_data:
    try:
        bid_id = bid['id']
        contractor_id = bid['contractor_id']
        bid_amount = float(bid['bid_amount'])
        budget = float(bid['estimated_budget'])
        completion_time = float(bid['completion_time'])
        required_duration = float(bid['execution_duration_days'])
        quality_certificates = float(bid['quality_certificates'])
        projects_last_5_years = float(bid['projects_last_5_years'])
        technical_matched_count = float(bid['technical_matched_count'])
        technical_requirements_count = float(bid['technical_requirements_count'])

        # ميزات مخصصة
        budget_adherence = min((bid_amount / budget) * 10, 10)

        if completion_time <= required_duration:
            speed_score = 10
        else:
            delay = completion_time - required_duration
            max_delay = 364
            normalized_delay = delay / max_delay
            speed_score = max(0, 10 * (1 - normalized_delay))

        quality_score = min(10, 5 + (quality_certificates * 1) + (2 if projects_last_5_years > 5 else 0))

        technical_score = (technical_matched_count / technical_requirements_count) * 10 if technical_requirements_count != 0 else 0

        features.append([
            bid_amount, completion_time, technical_score,
            budget_adherence, quality_score, speed_score
        ])
        contractor_ids.append(contractor_id)
        bid_ids.append(bid_id)

    except Exception as e:
        continue

# تطبيع الميزات
scaled_features = scaler.transform(features)

# التنبؤ باستخدام نموذج SVM
predictions = svm_model.predict(scaled_features)

# تحضير النتائج
results = []
for bid_id, contractor_id, score in zip(bid_ids, contractor_ids, predictions):
    results.append({
        "id": bid_id,
        "contractor_id": contractor_id,
        "predicted_score": round(float(score), 2)
    })
    print(json.dumps(results))
